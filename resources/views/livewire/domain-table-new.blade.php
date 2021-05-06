<div>
    <div class="py-4 space-y-4">
        <div>
            <div class="flex flex-row space-x-2">
                <div>
                    <select wire:model="perPage"
                            class="shadow-sm border-gray-200 bg-white pl-3 pr-10 h-auto rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>250</option>
                    </select>
                </div>
                <div class="w-1/4">
                    <x-input.text wire:model="search" placeholder="Search..." />
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

                                <a href="{{ route('domains.edit', $domain) }}"
                                   class="text-gray-600 hover:text-gray-900">
                                    <span class="sr-only">{{ __('Edit') }}</span>
                                    <x-heroicon-o-pencil-alt class="h-5 w-5"/>
                                </a>

                                <button wire:click="showDomainDelete({{ $domain }})"
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
</div>
