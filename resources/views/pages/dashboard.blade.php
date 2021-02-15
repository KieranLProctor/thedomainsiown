<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-4">
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-heroicon-o-scale class="h-6 w-6 text-gray-400"/>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    {{ __('Monthly Expenditure') }}
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
{{--                                        £{{ Auth::user()->totalItemsValue() }}--}}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('domains.index') }}" class="font-medium text-gray-700 hover:text-gray-900">
                            {{ __('View all') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-heroicon-o-shopping-cart class="h-6 w-6 text-gray-400"/>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    {{ __('Total Domains') }}
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ Auth::user()->domains->count() }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('domains.index') }}" class="font-medium text-gray-700 hover:text-gray-900">
                            {{ __('View all') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-heroicon-o-location-marker class="h-6 w-6 text-gray-400"/>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    {{ __('Total Registrars') }}
                                </dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">
{{--                                        {{ Auth::user()->registrars->count() }}--}}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="{{ route('registrars.index') }}" class="font-medium text-gray-700 hover:text-gray-900">
                            {{ __('View all') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
