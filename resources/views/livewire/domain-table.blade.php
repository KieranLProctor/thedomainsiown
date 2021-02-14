<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TLD
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Registrar
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Registered Date
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Yearly Cost
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Auto-renews?
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                SSL Certificate?
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">View</span>
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @if($domains->isEmpty())
            <tr>
                <td colspan="8" class="text-sm font-medium whitespace-nowrap text-center px-6 py-4 text-gray-700">
                    <span>
                        There doesn't appear to be any domains, why not <a class="underline"
                                                                           href="{{ route('domains.create') }}">Add one?</a>
                    </span>
                </td>
            </tr>
        @else
            @foreach($domains as $domain)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="{{ $domain->full_domain }}" target="_blank">{{ $domain->name }}</a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ $domain->topLevelDomain->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ $domain->registrar->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <x-carbon :date="$domain->registered_date" format="d M Y"/>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            £{{ $domain->formatted_yearly_cost }}
                        </div>
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
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('domains.show', $domain) }}"
                           class="text-gray-600 hover:text-gray-900">
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
        {{ $domains->links('livewire.pagination-link') }}
        </tbody>
    </table>
</div>
