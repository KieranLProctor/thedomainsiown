<x-app-layout>
    <x-slot name="header">
        {{ __('Domains') }}
    </x-slot>

    <div class="py-4">
        <livewire:domain-table-new/>
    </div>
</x-app-layout>
