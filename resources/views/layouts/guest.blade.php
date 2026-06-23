<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SupportDesk') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .auth-bg {
            background: #0a0f1e;
            background-image:
                radial-gradient(ellipse 80% 60% at 20% -10%, rgba(99,102,241,0.22) 0%, transparent 55%),
                radial-gradient(ellipse 60% 50% at 80% 110%, rgba(139,92,246,0.18) 0%, transparent 50%);
        }

        .auth-card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(99,102,241,0.18);
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.04) inset,
                0 32px 80px rgba(0,0,0,0.5),
                0 0 60px rgba(99,102,241,0.08);
        }

        .auth-input {
            background: rgba(255,255,255,0.05) !important;
            border-color: rgba(99,102,241,0.25) !important;
            color: #e2e8f0 !important;
            transition: all 0.2s ease;
        }
        .auth-input::placeholder { color: rgba(148,163,184,0.5) !important; }
        .auth-input:focus {
            background: rgba(255,255,255,0.07) !important;
            border-color: rgba(99,102,241,0.6) !important;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12) !important;
            outline: none !important;
        }

        .auth-btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            border: none;
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.025em;
            padding: 0.65rem 1.5rem;
            border-radius: 0.6rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 20px rgba(99,102,241,0.35);
        }
        .auth-btn:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 6px 28px rgba(99,102,241,0.5);
            transform: translateY(-1px);
        }
        .auth-btn:active { transform: translateY(0); }

        .auth-link {
            color: #818cf8;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }
        .auth-link:hover { color: #a5b4fc; text-decoration: underline; }

        .auth-label {
            color: #94a3b8;
            font-size: 0.8125rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 0;
            display: block;
        }

        .auth-footer {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
        }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(148,163,184,0.4);
            font-size: 0.8rem;
        }
        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(99,102,241,0.18);
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.6rem 1rem;
            border-radius: 0.6rem;
            border: 1px solid rgba(99,102,241,0.2);
            background: rgba(255,255,255,0.04);
            color: #cbd5e1;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .social-btn:hover {
            background: rgba(99,102,241,0.1);
            border-color: rgba(99,102,241,0.4);
            color: #e2e8f0;
        }

        .brand-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            box-shadow: 0 0 12px rgba(99,102,241,0.7);
            display: inline-block;
        }

        .checkbox-custom {
            accent-color: #6366f1;
            width: 1rem; height: 1rem;
        }

        .auth-card-wrap {
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Override default Blade component styling on inputs */
        input[type="text"].auth-input,
        input[type="email"].auth-input,
        input[type="password"].auth-input {
            background: rgba(255,255,255,0.05) !important;
            border: 1px solid rgba(99,102,241,0.25) !important;
            color: #e2e8f0 !important;
        }
    </style>
    @if(config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
    <script>window.recaptchaSiteKey = "{{ config('services.recaptcha.site_key') }}";</script>
    @endif
</head>
<body class="auth-bg min-h-screen antialiased">

    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-10">

        <!-- Brand -->
        <div class="mb-8 text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
                <div class="brand-dot group-hover:scale-110 transition-transform"></div>
                <span class="text-2xl font-bold tracking-tight text-white">
                    Support<span class="text-indigo-400">Desk</span>
                </span>
            </a>
            <p class="mt-2 text-slate-500 text-sm">Customer support, simplified.</p>
        </div>

        <!-- Card -->
        <div class="auth-card auth-card-wrap rounded-2xl px-8 py-8">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="mt-8 text-xs text-slate-600">
            &copy; {{ date('Y') }} SupportDesk. All rights reserved.
        </p>
    </div>

</body>
</html>
