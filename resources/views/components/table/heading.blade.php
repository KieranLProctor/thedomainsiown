<th {{ $attributes->merge(['class' => 'px-6 py-3 bg-gray-50'])->only('class') }}>
    @unless($sortable)
        <span class="text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            {{ $slot }}
        </span>
    @else
        <button
            {{ $attributes->except('class') }} class="flex items-center space-x-1 text-left text-xs uppercase tracking-wider text-gray-500 hover:text-gray-600 leading-4 font-medium">
            <span>{{ $slot }}</span>

            <span>
                @if($direction === 'asc')
                    <x-tabler-chevron-down class="w-3 h-3" />

                @elseif($direction === 'desc')
                    <x-tabler-chevron-up class="w-3 h-3"/>
                @else
                @endif
            </span>
        </button>
    @endunless
</th>
