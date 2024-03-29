@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'bg-gray-900 text-white group flex item-infos-center px-2 py-2 text-sm font-medium rounded-md'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white group flex item-infos-center px-2 py-2 text-sm font-medium rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
