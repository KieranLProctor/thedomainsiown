<div>


    <div class="flex justify-between">
        <div class="flex flex-row space-x-2">
            <select wire:model="perPage"
                    class="shadow-sm border-gray-200 bg-white pl-3 pr-10 h-auto rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
                <option>250</option>
            </select>

            <div class="mt-0.5 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none
text-gray-400 focus-within:text-gray-600">
                    <x-heroicon-o-search class="h-5 w-5"/>
                </div>
                <input name="search"
                       type="text"
                       placeholder="Search"
                       wire:model.debounce.300ms="search"
                       class="focus:ring-gray-900 focus:border-gray-900 block w-full pl-10 sm:text-sm border-gray-200 rounded-lg">
            </div>
        </div>

        <div>
            <a href="{{ route('domains.create') }}"
               class="inline-flex items-center h-full px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Add
                    Domain') }}</a>
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
