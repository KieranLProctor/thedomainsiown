<x-app-layout>
    <x-slot name="header">
        {{ __('Registrars') }}
    </x-slot>

    {{--    <div class="py-4">--}}
    {{--        <livewire:search-bar/>--}}
    {{--    </div>--}}

    <div class="py-4">
        <livewire:registrar-table/>
    </div>

</x-app-layout>
