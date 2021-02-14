<x-app-layout>
    <x-slot name="header">
        {{ __('Registrars') }}
    </x-slot>

    <div class="py-4">
        <livewire:search-bar/>
    </div>
    <div class="flex flex-col">
        <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <livewire:registrar-table/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
