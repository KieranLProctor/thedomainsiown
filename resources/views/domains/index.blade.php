<x-app-layout>
    <x-slot name="header">
        {{ __('Domains') }}
    </x-slot>

    <div class="py-4">
        <div class="flex justify-between">
            <div class="float-right">
                <a href="{{ route('domains.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Add
                    Domain') }}</a>
            </div>
        </div>
        <livewire:domain-table/>
    </div>
</x-app-layout>
