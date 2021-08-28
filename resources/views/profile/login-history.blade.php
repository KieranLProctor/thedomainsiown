<x-jet-action-section>
    <x-slot name="title">
        {{ __('Login History') }}
    </x-slot>

    <x-slot name="description">
        {{ __('View all login history we have stored on you.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('This list will show you your five previous login activities, if necessary you may click on the button to view all of your history.') }}
        </div>

        <div class="mt-5 space-y-6">
        {{ auth()->user()->previousLoginAt() }}
        </div>

        <div class="flex items-center mt-5">
            <x-jet-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('View All History') }}
            </x-jet-button>

            <x-jet-action-message class="ml-3" on="loggedOut">
                {{ __('Done.') }}
            </x-jet-action-message>
        </div>

        <!-- Logout Other Devices Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('Logout Other Browser Sessions') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please enter your password to confirm you would like to logout of your other browser sessions across all of your devices.') }}

                <div class="mt-4" x-data="{}"
                     x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                 placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="logoutOtherBrowserSessions"/>

                    <x-jet-input-error for="password" class="mt-2"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2"
                              wire:click="logoutOtherBrowserSessions"
                              wire:loading.attr="disabled">
                    {{ __('Logout Other Browser Sessions') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
