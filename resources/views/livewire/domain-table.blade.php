<div>
    <!-- Delete Domain Confirmation Modal -->
    <x-jet-dialog-modal wire:model="showingDomainDelete">
        <x-slot name="title">
            {{ __('Delete Domain') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this domain? Once the domain is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingDomainDelete')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteDomain" wire:loading.attr="disabled">
                {{ __('Delete Domain') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <div class="flex space-x-2">
        <select wire:model="perPage" class="shadow-sm border-gray-200 bg-white pl-3 pr-10 py-2 rounded-lg text-sm focus:outline-none">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
            <option>250</option>
        </select>

        <div class="relative text-gray-600">
            <input class="shadow-sm border-gray-200 bg-white px-5 pr-16 rounded-lg text-sm focus:outline-none"
                   type="search" name="search" placeholder="Search"
                   wire:model.debounce.300ms="search">
            <button type="submit" class="relative right-0 top-0 mt-2.5 mr-4">
                <x-heroicon-o-search class="text-gray-600 h-5 w-5"/>
            </button>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Registrar') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Registered Date') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Yearly Cost') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Auto-renews?') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('SSL Certificate?') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($domains->isEmpty())
                            <tr>
                                <td colspan="8"
                                    class="text-sm font-medium whitespace-nowrap text-center px-6 py-4 text-gray-700">
                    <span>
                        {{ __('There doesn\'t appear to be any domains, why not') }} <a class="underline"
                                                                                        href="{{ route('domains.create') }}">{{ __('Add one?') }}</a>
                    </span>
                                </td>
                            </tr>
                        @else
                            @foreach($domains as $domain)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <a href="{{ $domain->full_domain }}"
                                           target="_blank">{{ $domain->name . '.' . $domain->topLevelDomain->name }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $domain->registrar->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <x-carbon :date="$domain->registered_date" format="d M Y"/>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        £{{ $domain->formatted_yearly_cost }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            x-data="{ willAutoRenew: {{ $domain->will_autorenew }} }"
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                            :class="willAutoRenew ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                                {{ $domain->will_autorenew ? 'Yes' : 'No' }}
                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            x-data="{ hasSSLCertificate: {{ $domain->has_ssl_certificate }} }"
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                            :class="hasSSLCertificate ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                                {{ $domain->has_ssl_certificate ? 'Yes' : 'No' }}
                         </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
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
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        {{ $domains->links('livewire.pagination-link') }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
