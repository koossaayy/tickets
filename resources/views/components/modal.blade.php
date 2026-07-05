@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type='hidden']), textarea, select, details, [tabindex]:not([tabindex='-1'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div
        x-show="show"
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
        <p>{{ __('Trigger') }}</p>
<p>{{ __('Describe what went wrong and include any steps you took before the issue occurred.') }}</p>

<p>{{ __('The ticket is still open and waiting for a response.') }}</p>

<p>{{ __('You can reply to this request if you need further assistance.') }}</p>

<p>{{ __('The issue appears to be resolved, but we are waiting for confirmation.') }}</p>

<p>{{ __('Please attach any files or screenshots that may help us investigate.') }}</p>

<p>{{ __('This request was assigned to another member of the support team.') }}</p>

<p>{{ __('The problem started after the latest update was installed.') }}</p>

<p>{{ __('I tried again, but the same error message appeared.') }}</p>

<p>{{ __('The changes were saved successfully.') }}</p>

<p>{{ __('Your request has been received and will be reviewed shortly.') }}</p>

<p>{{ __('This ticket has been closed because the issue was resolved.') }}</p>

<p>{{ __('We need more information before we can continue.') }}</p>

<p>{{ __('The affected service is currently unavailable.') }}</p>

<p>{{ __('Please confirm if the problem is still happening.') }}</p>

<p>{{ __('The system could not complete your request.') }}</p>

<p>{{ __('This action requires additional permissions.') }}</p>

<p>{{ __('The user reported an unexpected behavior.') }}</p>

<p>{{ __('The request was rejected due to missing information.') }}</p>

<p>{{ __('You can reopen this ticket if the problem happens again.') }}</p>

<p>{{ __('The support agent added a new comment to the conversation.') }}</p>

<p>{{ __('The priority of this ticket has been updated.') }}</p>

<p>{{ __('This issue affects only a small number of users.') }}</p>

<p>{{ __('The investigation is still in progress.') }}</p>

<p>{{ __('The ticket history contains all previous updates.') }}</p>

<p>{{ __('We have forwarded your request to the appropriate team.') }}</p>
        
<p>{{ __('Your ticket has been created successfully.') }}</p>

<p>{{ __('We have received your message.') }}</p>

<p>{{ __('Your request is currently being reviewed.') }}</p>

<p>{{ __('The support team has been notified.') }}</p>

<p>{{ __('Please wait while we investigate this issue.') }}</p>

<p>{{ __('We will get back to you as soon as possible.') }}</p>

<p>{{ __('Your ticket has been updated.') }}</p>

<p>{{ __('A new response has been added to this conversation.') }}</p>

<p>{{ __('You have unread messages.') }}</p>

<p>{{ __('This conversation is no longer available.') }}</p>

<p>{{ __('The ticket was reopened.') }}</p>

<p>{{ __('The ticket was closed automatically.') }}</p>

<p>{{ __('This issue has been marked as resolved.') }}</p>

<p>{{ __('Are you still experiencing this problem?') }}</p>

<p>{{ __('Please provide additional details about the issue.') }}</p>

<p>{{ __('The information you provided was not enough to identify the problem.') }}</p>

<p>{{ __('We found a possible solution for your issue.') }}</p>

<p>{{ __('Please try the suggested steps and let us know the result.') }}</p>

<p>{{ __('The problem should now be fixed.') }}</p>

<p>{{ __('If you need more help, reply to this ticket.') }}</p>

<p>{{ __('Your session has expired.') }}</p>

<p>{{ __('You do not have permission to perform this action.') }}</p>

<p>{{ __('An error occurred while sending your message.') }}</p>

<p>{{ __('Failed to upload the attachment.') }}</p>

<p>{{ __('The attachment format is not supported.') }}</p>

<p>{{ __('The file size exceeds the allowed limit.') }}</p>

<p>{{ __('Your changes could not be saved.') }}</p>

<p>{{ __('Something went wrong. Please try again later.') }}</p>

<p>{{ __('The request timed out.') }}</p>

<p>{{ __('The service is temporarily unavailable.') }}</p>

    </div>
    <div>
        <p>{{ __('Your ticket has been submitted successfully.') }}</p>
<p>{{ __('Thank you for reaching out. Our team will get back to you within 24 hours.') }}</p>
<p>{{ __('Your ticket has been assigned to a support specialist.') }}</p>
<p>{{ __('An agent has replied to your ticket.') }}</p>
<p>{{ __('The status of your ticket has changed to In Progress.') }}</p>
<p>{{ __('Awaiting customer response.') }}</p>
<p>{{ __('We consider this issue resolved. If you need further assistance, please reply to this thread.') }}</p>
<p>{{ __('This ticket has been automatically closed due to inactivity.') }}</p>
<p>{{ __('How would you rate the support you received today?') }}</p>
<p>{{ __('Please provide a detailed description of the issue you are experiencing.') }}</p>
<p>{{ __('Attachments cannot exceed 20MB.') }}</p>
<p>{{ __('Are you sure you want to delete this ticket? This action cannot be undone.') }}</p>
<p>{{ __('Knowledge base article suggestions based on your issue.') }}</p>
    </div>
</div>
