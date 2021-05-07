<div>
    <div class="py-4 space-y-4">
        <div>
            <div class="flex flex-row space-x-2">
                <div>
                    <select wire:model="perPage"
                            class="shadow-sm border-gray-300 bg-white pl-3 pr-10 h-auto rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>250</option>
                    </select>
                </div>
                <div class="w-1/4">
                    <x-input.text wire:model="search" placeholder="Search..."/>
                </div>
            </div>
            <div class="float-right">
                <x-jet-button>
                    {{ __('Test') }}
                </x-jet-button>
            </div>
        </div>

        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable
                                     wire:click="sortBy('name')"
                                     :direction="$sortField === 'name' ? $sortDirection : null">
                        Name
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('registrars.name')"
                                     :direction="$sortField === 'registrars.name' ? $sortDirection : null">
                        Registrar
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('registered_date')"
                                     :direction="$sortField === 'registered_date' ? $sortDirection : null">
                        Registered Date
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('yearly_cost')"
                                     :direction="$sortField === 'yearly_cost' ? $sortDirection : null">
                        Yearly Cost
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('will_autorenew')"
                                     :direction="$sortField === 'will_autorenew' ? $sortDirection : null">
                        Auto-Renews?
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('has_ssl_certificate')"
                                     :direction="$sortField === 'has_ssl_certificate' ? $sortDirection : null">
                        SSL Certificate?
                    </x-table.heading>
                    <x-table.heading>Actions</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse($domains as $domain)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell>{{ $domain->full_domain }}</x-table.cell>
                            <x-table.cell>{{ $domain->registrar->name }}</x-table.cell>
                            <x-table.cell>
                                <x-carbon :date="$domain->registered_date" format="d M Y"/>
                            </x-table.cell>
                            <x-table.cell>£{{ $domain->formatted_yearly_cost }}</x-table.cell>
                            <x-table.cell>
                                <span
                                    x-data="{ willAutoRenew: {{ $domain->will_autorenew }} }"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                    :class="willAutoRenew ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                                        {{ $domain->will_autorenew ? 'Yes' : 'No' }}
                                </span>
                            </x-table.cell>
                            <x-table.cell>
                                <span
                                    x-data="{ hasSSLCertificate: {{ $domain->has_ssl_certificate }} }"
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                    :class="hasSSLCertificate ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                                        {{ $domain->has_ssl_certificate ? 'Yes' : 'No' }}
                                </span>
                            </x-table.cell>
                            <x-table.cell class="flex items-center space-x-2">
                                <a href="{{ route('domains.show', $domain) }}"
                                   class="text-gray-600 hover:text-gray-900">
                                    <span class="sr-only">{{ __('View') }}</span>
                                    <x-heroicon-o-eye class="h-5 w-5"/>
                                </a>

                                <button wire:click="showEditModal({{ $domain }})"
                                        class="text-gray-600 hover:text-gray-900">
                                    <span class="sr-only">{{ __('Edit') }}</span>
                                    <x-heroicon-o-pencil-alt class="h-5 w-5"/>
                                </button>

                                <button wire:click="showDeleteModal({{ $domain }})"
                                        class="text-gray-600 hover:text-red-600">
                                    <span class="sr-only">{{ __('Delete') }}</span>
                                    <x-heroicon-o-trash class="h-5 w-5"/>
                                </button>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="3">
                                <div class="flex justify-center items-center">
                                    <span
                                        class="text-xl text-gray-400 py-8 font-medium">{{ __('No domains found...') }}</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{ $domains->links('livewire.pagination-link') }}
            </div>
        </div>
    </div>

    <!-- Edit Domain Modal -->
    <x-jet-dialog-modal wire:model.defer="showingEditModal">
        <x-slot name="title">
            {{ __('Edit Domain') }}
        </x-slot>

        <x-slot name="content">
        {{--            <x-input.group for="" title="">--}}
        {{--                <x-input.text id=""></x-input.text>--}}
        {{--            </x-input.group>--}}
        <!-- Name -->
            <x-jet-label for="name" value="{{ __('Name') }}"/>
            <input id="name" name="name"
                   class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                   type="text"
                   value="{{ $domain->name }}">
            <x-jet-input-error for="name" class="mt-2"/>

            <!-- Registered Date -->
            <x-jet-label for="registered_date" value="{{ __('Registered Date') }}"/>
            <x-pikaday name="registered_date"
                       class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                       format="YYYY-MM-DD"
                       value="{{ $domain->registered_date }}"/>
            <x-jet-input-error for="registered_date" class="mt-2"/>

            <!-- Yearly Cost -->
            <x-jet-label for="yearly_cost" value="{{ __('Yearly Cost') }}"/>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                            £
                                        </span>
                </div>
                <input type="number" name="yearly_cost" id="yearly_cost"
                       class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                       placeholder="0.00" value="{{ $domain->formatted_yearly_cost }}"
                       aria-describedby="price-currency">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                            GBP
                                        </span>
                </div>
            </div>
            <x-jet-input-error for="yearly_cost" class="mt-2"/>

            <!-- Auto Renews -->
            <label for="will_autorenew" class="flex items-center">
                <input type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="will_autorenew" {{ $domain->will_autorenew == 1 ? 'checked' : null }}/>
                <span class="ml-2 text-sm text-gray-600">{{ __('Auto-renews?') }}</span>
            </label>

            <!-- SSL Certificate -->
            <label for="has_ssl_certificate" class="flex items-center">
                <input type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="has_ssl_certificate" {{ $domain->has_ssl_certificate == 1 ? 'checked' : null }}/>
                <span class="ml-2 text-sm text-gray-600">{{ __('SSL Certificate?') }}</span>
            </label>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingEditModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="editDomain" wire:loading.attr="disabled">
                {{ __('Edit Domain') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete Domain Confirmation Modal -->
    <x-jet-confirmation-modal wire:model.defer="showingDeleteModal">
        <x-slot name="title">
            {{ __('Delete Domain') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this domain? Once the domain is deleted, all of its resources and data will be permanently lost.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingDeleteModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteDomain" wire:loading.attr="disabled">
                {{ __('Delete Domain') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
