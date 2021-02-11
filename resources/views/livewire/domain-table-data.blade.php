<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-medium text-gray-900">
{{--            {{ $location->name }}--}}
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">
{{--            {{ $location->description }}--}}
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
{{--        {{ $location->items->count() }}--}}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{ route('domains.show', $domain) }}"
           class="text-gray-600 hover:text-gray-900">
            View
        </a>
    </td>
</tr>
