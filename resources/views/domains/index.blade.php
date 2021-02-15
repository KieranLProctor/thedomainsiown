<x-app-layout>
    <x-slot name="header">
        {{ __('Domains') }}
    </x-slot>

    @if(session()->has('message'))
        <livewire:success-notification/>
    @endif

    <div class="py-4">
        <div class="flex justify-between">
            <livewire:search-bar/>
            <div class="float-right">
                <a href="{{ route('domains.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Add
                    Domain') }}</a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <livewire:domain-table/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
