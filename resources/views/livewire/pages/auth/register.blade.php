<?php

use App\Models\User;
use App\Services\RecaptchaService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $recaptchaToken = '';

    public function register(RecaptchaService $recaptcha): void
    {
        $this->resetErrorBag();

        $validated = $this->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class
            ],

            'password' => [
                'required',
                'string',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);


        if (! $recaptcha->verify($this->recaptchaToken, 'register')) {
            $this->addError(
                'email',
                'Security check failed. Please try again.'
            );

            return;
        }


        $validated['password'] = Hash::make(
            $validated['password']
        );


        event(
            new Registered(
                $user = User::create($validated)
            )
        );


        Auth::login($user);


        $this->redirect(
            route('dashboard'),
            navigate: true
        );
    }
};
?>


<div>

    <div class="mb-7">
        <h1 class="text-xl font-bold text-white">
            Create your account
        </h1>
    </div>


    <form
        novalidate

        x-data="{
            submitForm() {

                if (
                    typeof grecaptcha === 'undefined'
                    || !window.recaptchaSiteKey
                ) {
                    $wire.register()
                    return
                }

                grecaptcha.ready(() => {

                    grecaptcha.execute(
                        window.recaptchaSiteKey,
                        { action: 'register' }
                    )
                    .then(token => {

                        $wire.set(
                            'recaptchaToken',
                            token
                        )

                        $wire.register()

                    })

                })

            }
        }"

        @submit.prevent="submitForm"
    >


        <input 
            type="hidden"
            wire:model.live="recaptchaToken"
        >



        <!-- Name -->
        <div class="mb-4">

            <label 
                for="name"
                class="auth-label"
            >
                Full Name
            </label>


            <input

                wire:model.live="name"

                id="name"

                type="text"

                autocomplete="name"

                placeholder="Jane Smith"

                class="auth-input block w-full rounded-lg px-4 py-2.5 text-sm focus:outline-none"

            />


            @error('name')

                <p class="mt-1.5 text-xs text-red-400">
                    {{ $message }}
                </p>

            @enderror

        </div>




        <!-- Email -->

        <div class="mb-4">


            <label
                for="email"
                class="auth-label"
            >
                Email Address
            </label>


            <input

                wire:model.live="email"

                id="email"

                type="email"

                autocomplete="username"

                placeholder="you@example.com"

                class="auth-input block w-full rounded-lg px-4 py-2.5 text-sm focus:outline-none"

            />


            @error('email')

                <p class="mt-1.5 text-xs text-red-400">
                    {{ $message }}
                </p>

            @enderror


        </div>




        <!-- Password -->

        <div class="mb-4">


            <label
                for="password"
                class="auth-label"
            >
                Password
            </label>


            <input

                wire:model.live="password"

                id="password"

                type="password"

                autocomplete="new-password"

                placeholder="Strong Password Required (min 12 char)"

                class="auth-input block w-full rounded-lg px-4 py-2.5 text-sm focus:outline-none"

            />



            @error('password')

                <p class="mt-1.5 text-xs text-red-400">
                    {{ $message }}
                </p>

            @enderror


        </div>




        <!-- Confirm Password -->


        <div class="mb-5">


            <label
                for="password_confirmation"
                class="auth-label"
            >
                Confirm Password
            </label>



            <input

                wire:model.live="password_confirmation"

                id="password_confirmation"

                type="password"

                autocomplete="new-password"

                placeholder="Repeat your password"

                class="auth-input block w-full rounded-lg px-4 py-2.5 text-sm focus:outline-none"

            />



            @error('password_confirmation')

                <p class="mt-1.5 text-xs text-red-400">
                    {{ $message }}
                </p>

            @enderror


        </div>




        <!-- Submit -->


        <button

            type="submit"

            class="auth-btn w-full mt-2"

        >


            <span wire:loading.remove wire:target="register">

                Create Account

            </span>



            <span

                wire:loading

                wire:target="register"

                class="flex items-center justify-center gap-2"

            >

                <svg
                    class="animate-spin h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                >

                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>


                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
                    ></path>

                </svg>


                Creating account…

            </span>


        </button>


    </form>



    <p class="auth-footer">

        Already have an account?

        <a
            href="{{ route('login') }}"
            
            class="auth-link font-medium ml-1"
        >
            Sign in
        </a>

    </p>


</div>