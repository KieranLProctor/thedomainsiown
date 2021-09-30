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
            <!-- Login History -->
            @foreach ($this->logins->take(5) as $login)
                <div class="flex items-center">
                    <div>
                        @if ($login->agent->isDesktop())
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                <path
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                 class="w-8 h-8 text-gray-500">
                                <path d="M0 0h24v24H0z" stroke="none"></path>
                                <rect x="7" y="4" width="10" height="16" rx="1"></rect>
                                <path d="M11 5h2M12 17v.01"></path>
                            </svg>
                        @endif
                    </div>

                    <div class="ml-3">
                        <div class="text-sm text-gray-600">
                            {{ $login->agent->platform() }} - {{ $login->agent->browser() }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ $login->ip_address }},

                                @if ($login->is_logged_out)
                                    <span class="text-green-500 font-semibold">{{ __('Logged Out') }}</span>
                                @else
                                    <span class="font-semibold">{{ $login->login_at }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="flex items-center mt-5">
            <x-jet-button wire:click="$toggle('showingLoginHistory')" wire:loading.attr="disabled">
                {{ __('View All History') }}
            </x-jet-button>
        </div>

        <!-- Show All Login History Modal -->
        <x-jet-dialog-modal wire:model="showingLoginHistory">
            <x-slot name="title">
                {{ __('View All Login History') }}
            </x-slot>

            <x-slot name="content">
                <div class="mt-4 space-y-6">
                    @foreach ($this->logins as $login)
                        <div class="flex items-center">
                            <div>
                                @if ($login->agent->isDesktop())
                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                        <path
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="w-8 h-8 text-gray-500">
                                        <path d="M0 0h24v24H0z" stroke="none"></path>
                                        <rect x="7" y="4" width="10" height="16" rx="1"></rect>
                                        <path d="M11 5h2M12 17v.01"></path>
                                    </svg>
                                @endif
                            </div>

                            <div class="ml-3">
                                <div class="text-sm text-gray-600">
                                    {{ $login->agent->platform() }} - {{ $login->agent->browser() }}
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">
                                        {{ $login->ip_address }},

                                        @if ($login->is_logged_out)
                                            <span class="text-green-500 font-semibold">{{ __('Logged Out') }}</span>
                                        @else
                                            <span class="font-semibold">{{ $login->login_at }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button wire:click="$toggle('showingLoginHistory')" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
