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
            {{ $domain->registered_date }}
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
