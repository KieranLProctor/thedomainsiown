<x-app-layout>
    <div>
        <div class="mt-5 md:mt-0 w-1/2">
            <form action="{{ route('domains.store') }}" method="POST">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            {{ __('Add Domain') }}
                        </h1>
                        <div class="grid grid-cols-3 gap-6">
                            <!-- Name -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="name" value="{{ __('Name') }}"/>
                                <input id="name" name="name"
                                       class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                       type="text">
                                <x-jet-input-error for="name" class="mt-2"/>
                            </div>

                            <!-- TLD -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="top_level_domain_id" value="{{ __('TLD') }}"/>
                                <select id="top_level_domain_id" name="top_level_domain_id"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="" selected>Select...</option>
                                    @foreach($tlds as $tld)
                                        <option value="{{ $tld->id }}">{{ $tld->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="top_level_domain_id" class="mt-2"/>
                            </div>

                            <!-- Registrar -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="registrar_id" value="{{ __('Registrar') }}"/>
                                <select id="registrar_id" name="registrar_id"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="" selected>Select...</option>
                                    @foreach($registrars as $registrar)
                                        <option value="{{ $registrar->id }}">{{ $registrar->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="registrar_id" class="mt-2"/>
                            </div>

                            <!-- Registered Date -->
                            <div class="col-span-3 sm:col-span-2">
                                <x-jet-label for="registered_date" value="{{ __('Registered Date') }}"/>
                                <x-pikaday name="registered_date"
                                           class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"/>
                                <x-jet-input-error for="registered_date" class="mt-2"/>
                            </div>

                            <!-- Yearly Cost -->
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="yearly_cost" value="{{ __('Yearly Cost') }}"/>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">
                                            £
                                        </span>
                                    </div>
                                    <input type="number" name="yearly_cost" id="yearly_cost"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                                           placeholder="0.00" aria-describedby="price-currency">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                                            GBP
                                        </span>
                                    </div>
                                </div>
                                <x-jet-input-error for="yearly_cost" class="mt-2"/>
                            </div>

                            <!-- Auto Renews -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="will_autorenew" class="flex items-center">
                                    <x-jet-checkbox id="will_autorenew" name="will_autorenew"/>
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Auto-renews?') }}</span>
                                </label>
                            </div>

                            <!-- SSL Certificate -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="has_ssl_certificate" class="flex items-center">
                                    <x-jet-checkbox id="has_ssl_certificate" name="has_ssl_certificate"/>
                                    <span class="ml-2 text-sm text-gray-600">{{ __('SSL Certificate?') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-jet-button>
                            {{ __('Add Domain') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
