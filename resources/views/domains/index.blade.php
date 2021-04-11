<x-app-layout>
    <x-slot name="header">
        {{ __('Domains') }}
    </x-slot>

    <div class="py-4">
        <livewire:domain-table/>
    </div>

    <div class="py-8">
        <livewire:domain-table-new/>
    </div>
</x-app-layout>
