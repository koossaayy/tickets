<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between border-b border-slate-200/80 pb-5 mb-8">
        <div>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl bg-slate-100 border border-slate-200 text-xs font-semibold text-slate-500 mb-2">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                {{ __('Secure Ticket Portal') }}
            </div>
            <h2 class="font-bold text-2xl text-slate-900 leading-tight">
                {{ $ticket->title }}
            </h2>
            <p class="text-sm text-slate-500 mt-0.5">{{ __('Ticket #:param_1 · Created :param_2', ['param_1' => $ticket->id, 'param_2' => $ticket->created_at->format('M j, Y g:i A')]) }}</p>
        </div>
        <x-ticket-status-badge :status="$ticket->status" class="px-3.5 py-1 text-sm shadow-sm" />
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <!-- Main Conversation Area -->
        <div class="lg:col-span-2 space-y-6">
            @if (session('status'))
                <div class="rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-sm text-emerald-800 flex items-center gap-2 shadow-sm animate-fade-in">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('status') }}
                </div>
            @endif

            <!-- Original request description -->
            <div class="bg-white border border-slate-200/70 shadow-sm rounded-2xl p-6 sm:p-8">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-5">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">
                            {{ substr($ticket->user->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ $ticket->user->name }}</h4>
                            <p class="text-xs text-slate-400">{{ __('Original Request') }}</p>
                        </div>
                    </div>
                </div>
                <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-wrap">{{ $ticket->description }}</p>
                @include('partials.ticket-attachments', ['attachments' => $ticket->attachments])
            </div>

            <!-- Conversation Thread -->
            <div class="space-y-6">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    {{ __('Replies & Updates') }}
                </h3>
                
                @forelse ($ticket->replies as $reply)
                    @php
                        $isSupport = $reply->user?->isAdmin();
                    @endphp
                    <div class="bg-white border shadow-sm rounded-2xl p-6 sm:p-8 transition-all hover:shadow-md {{ $isSupport ? 'border-indigo-150 bg-indigo-50/20' : 'border-slate-200/70' }}">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100/80 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-xl flex items-center justify-center font-bold text-sm {{ $isSupport ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-700' }}">
                                    {{ substr($reply->authorLabel(), 0, 1) }}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h4 class="font-bold text-slate-800 text-sm">{{ $reply->authorLabel() }}</h4>
                                        @if ($isSupport)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-indigo-100 text-indigo-700 text-[10px] font-bold tracking-wider uppercase">
                                                {{ __('Support Agent') }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-slate-400">{{ $reply->created_at->format('M j, Y g:i A') }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-wrap">{{ $reply->body }}</p>
                        @include('partials.ticket-attachments', ['attachments' => $reply->attachments])
                    </div>
                @empty
                    <div class="border border-dashed border-slate-200 rounded-2xl p-8 text-center text-slate-400 text-sm">
                        {{ __('No replies recorded yet.') }}
                    </div>
                @endforelse
            </div>

            <!-- Guest Reply Form -->
            @if ($ticket->status->value !== 'closed')
                <div class="bg-white border border-slate-200/70 shadow-sm rounded-2xl p-6 sm:p-8">
                    <h3 class="font-bold text-slate-800 text-lg">{{ __('Post a Reply') }}</h3>
                    <form
                        x-data="{
                            submitForm() {
                                if (typeof grecaptcha === 'undefined' || !window.recaptchaSiteKey) {
                                    $wire.reply(); return;
                                }
                                grecaptcha.ready(() => {
                                    grecaptcha.execute(window.recaptchaSiteKey, { action: 'ticket_reply' }).then(token => {
                                        $wire.recaptchaToken = token;
                                        $wire.reply();
                                    });
                                });
                            }
                        }"
                        @submit.prevent="submitForm"
                        class="mt-4 space-y-4"
                    >
                        <input type="hidden" wire:model="recaptchaToken">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <x-input-label for="author_name" :value="__('Your Name')" class="text-slate-500 text-xs font-semibold uppercase tracking-wider" />
                                <x-text-input wire:model="author_name" id="author_name" class="block mt-1.5 w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm" type="text" required />
                                <x-input-error :messages="$errors->get('author_name')" class="mt-1 text-xs" />
                            </div>
                            <div>
                                <x-input-label for="author_email" :value="__('Your Email (must match ticket owner)')" class="text-slate-500 text-xs font-semibold uppercase tracking-wider" />
                                <x-text-input wire:model="author_email" id="author_email" class="block mt-1.5 w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm" type="email" required />
                                <x-input-error :messages="$errors->get('author_email')" class="mt-1 text-xs" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Message')" class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1" />
                            <textarea wire:model="body" id="body" rows="5"
                                      class="block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm shadow-sm"
                                      placeholder="{{ __('Type your reply here...') }}" required></textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2 text-xs" />
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">{{ __('Upload Files (optional)') }}</label>
                            <input wire:model="attachments" type="file" multiple
                                   accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.txt,.doc,.docx"
                                   class="block w-full text-xs text-slate-500 border border-slate-200/80 rounded-xl bg-slate-50 file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-200 file:text-slate-700 hover:file:bg-slate-300 file:cursor-pointer cursor-pointer shadow-sm" />
                            
                            @if (!empty($attachments))
                                <div class="mt-2 text-xs text-slate-500">
                                    {{ __('Files selected: :param_1', ['param_1' => count($attachments)]) }}
                                </div>
                            @endif
                            <x-input-error :messages="$errors->get('attachments.*')" class="mt-2 text-xs" />
                        </div>

                        <div class="flex justify-end pt-2 border-t border-slate-100">
                            <x-primary-button wire:loading.attr="disabled" class="rounded-xl px-5 py-2.5">
                                <span wire:loading.remove wire:target="reply">{{ __('Send Message') }}</span>
                                <span wire:loading wire:target="reply" class="flex items-center gap-1.5">
                                    <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    {{ __('Sending...') }}
                                </span>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            @else
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50 p-5 text-center text-sm text-slate-500 shadow-sm">
                    <span class="inline-flex items-center gap-1.5 font-semibold text-slate-700">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        {{ __('This ticket is closed') }}
                    </span>
                    <p class="mt-1 text-xs">{{ __('Replies are disabled. If you have further issues, please submit a new ticket.') }}</p>
                </div>
            @endif
        </div>

        <!-- Right Side Sidebar -->
        <div class="space-y-6">
            <div class="bg-white border border-slate-200/70 shadow-sm rounded-2xl p-6 space-y-5">
                <h3 class="font-bold text-slate-800 text-base pb-3 border-b border-slate-100">{{ __('Ticket Information') }}</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider block">{{ __('Assigned Agent') }}</label>
                        <div class="mt-1 flex items-center gap-2">
                            <div class="h-6 w-6 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                                {{ $ticket->assignee ? substr($ticket->assignee->name, 0, 1) : '?' }}
                            </div>
                            <span class="text-sm font-semibold text-slate-700">
                                {{ $ticket->assignee ? $ticket->assignee->name : __('Unassigned')}}
                            </span>
                        </div>
                    </div>
                    
                    <div>
                        <label class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider block">{{ __('Last Activity') }}</label>
                        <span class="text-sm font-semibold text-slate-700 block mt-0.5">
                            {{ $ticket->updated_at->diffForHumans() }}
                        </span>
                    </div>

                    <div>
                        <label class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider block">{{ __('Reply via Email') }}</label>
                        <span class="text-xs font-mono font-semibold text-slate-600 block mt-1 break-all bg-slate-50 border border-slate-100 p-2 rounded-lg">
                            {{ $ticket->replyEmailAddress() }}
                        </span>
                        <p class="text-[10px] text-slate-400 mt-1">{{ __('Send mail to this address to post replies directly.') }}</p>
                        <p class="text-[10px] text-slate-400 mt-1">{{ __('Hello world') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rounded-xl border border-amber-200 bg-amber-50 p-4 space-y-3">
    <h4 class="font-semibold text-amber-900">{{ __('Livewire Test Area') }}</h4>
    <h4 class="font-semibold text-amber-900">{{ __('Hello World') }}</h4>

    <input
        type="text"
        wire:model.live="author_name"
        placeholder="{{ __('Type here...') }}"
        class="w-full rounded-lg border-slate-300"
    />

    <div class="text-sm text-slate-600">
        {{ __('Current value:') }}
        <span class="font-bold">{{ $author_name }}</span>
    </div>

    <button
        wire:click="reply"
        type="button"
        class="px-4 py-2 bg-indigo-600 text-white rounded-lg"
    >
        {{ __('Test Action') }}
    </button>

    <div wire:loading class="text-indigo-600 text-sm">
        {{ __('Loading...') }}
    </div>

    <div wire:loading.remove class="text-green-600 text-sm">
        {{ __('Idle') }}
    </div>
</div>
<div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-slate-900">{{ __('Demo Components') }}</h3>
            <p class="text-sm text-slate-500">{{ __('Testing layout and responsiveness.') }}</p>
        </div>

        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">
            {{ __('Active') }}
        </span>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div class="rounded-xl border p-4">
            <div class="text-xs uppercase text-slate-400">{{ __('Users') }}</div>
            <div class="mt-2 text-3xl font-bold">2,481</div>
            <div class="text-green-600 text-sm mt-1">↑ 12%</div>
        </div>

        <div class="rounded-xl border p-4">
            <div class="text-xs uppercase text-slate-400">{{ __('Tickets') }}</div>
            <div class="mt-2 text-3xl font-bold">183</div>
            <div class="text-red-600 text-sm mt-1">↓ 4%</div>
        </div>

        <div class="rounded-xl border p-4">
            <div class="text-xs uppercase text-slate-400">{{ __('Response Time') }}</div>
            <div class="mt-2 text-3xl font-bold">14m</div>
            <div class="text-slate-500 text-sm mt-1">{{ __('Average') }}</div>
        </div>
    </div>

    <div class="space-y-3">

        <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border">
            <div class="h-10 w-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">
                {{ __('J') }}
            </div>

            <div class="flex-1">
                <div class="flex justify-between">
                    <h4 class="font-semibold">{{ __('John Doe') }}</h4>
                    <span class="text-xs text-slate-400">{{ __('2 min ago') }}</span>
                </div>

                <p class="mt-2 text-sm text-slate-600">
                    {{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus, nisl quis vestibulum tempus, libero justo hendrerit turpis, vitae ultrices nulla neque sed elit.') }}
                </p>

                <div class="flex gap-2 mt-3">
                    <span class="px-2 py-1 rounded bg-indigo-100 text-indigo-700 text-xs">{{ __('Support') }}</span>
                    <span class="px-2 py-1 rounded bg-slate-200 text-slate-700 text-xs">{{ __('Priority') }}</span>
                </div>
            </div>
        </div>

        <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border">
            <div class="h-10 w-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold">
                {{ __('A') }}
            </div>

            <div class="flex-1">
                <div class="flex justify-between">
                    <h4 class="font-semibold">{{ __('Alice Smith') }}</h4>
                    <span class="text-xs text-slate-400">{{ __('Yesterday') }}</span>
                </div>

                <p class="mt-2 text-sm text-slate-600">
                    {{ __('Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum.') }}
                </p>

                <div class="mt-4 flex gap-3">
                    <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        {{ __('Accept') }}
                    </button>

                    <button class="px-4 py-2 rounded-lg border hover:bg-slate-100">
                        {{ __('Reject') }}
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="rounded-xl bg-slate-100 p-5">
        <div class="flex justify-between mb-2">
            <span class="font-medium">{{ __('Storage Usage') }}</span>
            <span>74%</span>
        </div>

        <div class="w-full h-3 rounded-full bg-slate-200 overflow-hidden">
            <div class="h-full w-3/4 bg-indigo-600 rounded-full"></div>
        </div>
    </div>

</div>

<div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

    <div class="px-6 py-5 border-b bg-gradient-to-r from-indigo-600 to-indigo-500 text-white">
        <h3 class="text-xl font-bold">Project Overview</h3>
        <p class="text-indigo-100 text-sm mt-1">
            Internal dashboard preview
        </p>
    </div>

    <div class="p-6 space-y-8">

        <!-- Team -->
        <div>
            <h4 class="font-semibold text-slate-800 mb-4">Team Members</h4>

            <div class="space-y-4">

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-red-500 text-white flex items-center justify-center font-bold">
                            M
                        </div>

                        <div>
                            <div class="font-semibold">Michael Scott</div>
                            <div class="text-sm text-slate-500">Project Manager</div>
                        </div>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                        Online
                    </span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">
                            S
                        </div>

                        <div>
                            <div class="font-semibold">Sarah Connor</div>
                            <div class="text-sm text-slate-500">Backend Engineer</div>
                        </div>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                        Away
                    </span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-purple-500 text-white flex items-center justify-center font-bold">
                            D
                        </div>

                        <div>
                            <div class="font-semibold">David Miller</div>
                            <div class="text-sm text-slate-500">Designer</div>
                        </div>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-slate-200 text-slate-700 text-xs font-semibold">
                        Offline
                    </span>
                </div>

            </div>
        </div>

        <!-- Tasks -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h4 class="font-semibold text-slate-800">Recent Tasks</h4>

                <button class="text-indigo-600 text-sm font-medium hover:underline">
                    View all
                </button>
            </div>

            <div class="divide-y border rounded-xl">

                <div class="p-4 flex justify-between items-center">
                    <div>
                        <div class="font-medium">Implement authentication</div>
                        <div class="text-sm text-slate-500">
                            Assigned to Sarah
                        </div>
                    </div>

                    <span class="text-green-600 font-semibold">
                        Complete
                    </span>
                </div>

                <div class="p-4 flex justify-between items-center">
                    <div>
                        <div class="font-medium">Design landing page</div>
                        <div class="text-sm text-slate-500">
                            Assigned to David
                        </div>
                    </div>

                    <span class="text-amber-600 font-semibold">
                        In Progress
                    </span>
                </div>

                <div class="p-4 flex justify-between items-center">
                    <div>
                        <div class="font-medium">Prepare deployment</div>
                        <div class="text-sm text-slate-500">
                            Assigned to Michael
                        </div>
                    </div>

                    <span class="text-slate-500 font-semibold">
                        Pending
                    </span>
                </div>

            </div>
        </div>

        <!-- Activity -->
        <div>
            <h4 class="font-semibold text-slate-800 mb-4">Latest Activity</h4>

            <div class="relative border-l-2 border-slate-200 ml-3 space-y-6">

                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-indigo-600"></div>
                    <div class="font-medium">New ticket created</div>
                    <div class="text-sm text-slate-500">5 minutes ago</div>
                </div>

                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-green-500"></div>
                    <div class="font-medium">Deployment completed</div>
                    <div class="text-sm text-slate-500">Yesterday</div>
                </div>

                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-orange-500"></div>
                    <div class="font-medium">Database backup finished</div>
                    <div class="text-sm text-slate-500">2 days ago</div>
                </div>

            </div>
        </div>

    </div>

</div>
</div>
