<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @bukStyles
</head>
<body class="font-sans antialiased">
<div class="h-screen flex overflow-hidden bg-gray-100"
     x-data="{ sidebarOpen: false }"
     @keydown.window.escape="sidebarOpen = false">
    <div class="md:hidden"
         x-show="sidebarOpen">
        <div class="fixed inset-0 flex z-40">
            <div @click="sidebarOpen = false"
                 x-show="sidebarOpen"
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0"
                 aria-hidden="true">
                <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
            </div>

            <div x-show="sidebarOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button"
                            x-show="sidebarOpen"
                            @click="sidebarOpen = false"
                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">{{ __('Close sidebar') }}</span>
                        <x-heroicon-o-x class="h-6 w-6 text-white"/>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center px-4">
                    <a href="{{ route('pages.dashboard') }}">
                        <img class="h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                             alt="Workflow">
                    </a>
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="px-2 space-y-1">
                        <x-jet-responsive-nav-link href="{{ route('pages.dashboard') }}"
                                                   :active="request()->routeIs('pages.dashboard')">
                            <x-tabler-home
                                class="mr-4 h-6 w-6"/>
                            {{ __('Dashboard') }}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('domains.index') }}"
                                                   :active="request()->routeIs('domains.*')">
                            <x-heroicon-o-shopping-cart
                                class="mr-4 h-6 w-6"/>
                            {{ __('Domains') }}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('registrars.index') }}"
                                                   :active="request()->routeIs('registrars.*')">
                            <x-heroicon-o-location-marker
                                class="mr-4 h-6 w-6"/>
                            {{ __('Registrars') }}
                        </x-jet-responsive-nav-link>
                    </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col h-0 flex-1">
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                    <a href="{{ route('pages.dashboard') }}">
                        <img class="h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                             alt="Workflow">
                    </a>
                </div>
                <div class="flex-1 flex flex-col overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 bg-gray-800 space-y-1">
                        <x-jet-nav-link href="{{ route('pages.dashboard') }}"
                                        :active="request()->routeIs('pages.dashboard')">
                            <x-tabler-home class="mr-3 h-6 w-6"/>
                            {{ __('Dashboard') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('domains.index') }}"
                                        :active="request()->routeIs('domains.*')">
                            <x-heroicon-o-shopping-cart class="mr-3 h-6 w-6"/>
                            {{ __('Domains') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('registrars.index') }}"
                                        :active="request()->routeIs('registrars.*')">
                            <x-heroicon-o-location-marker class="mr-3 h-6 w-6"/>
                            {{ __('Registrars') }}
                        </x-jet-nav-link>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button
                @click.stop="sidebarOpen = true"
                class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                <span class="sr-only">{{ __('Open sidebar') }}</span>
                <x-heroicon-o-menu-alt-2 class="h-6 w-6"/>
            </button>
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex">
                    <form class="w-full flex md:ml-0" action="#" method="GET">
                        <label for="search_field" class="sr-only">{{ __('Search') }}</label>
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                <x-tabler-search class="h-5 w-5"/>
                            </div>
                            <input id="search_field"
                                   class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm"
                                   placeholder="Search" type="search" name="search">
                        </div>
                    </form>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Notifications dropdown -->
                    <div class="ml-3 sm:flex sm:items-center">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">{{ __('View Notifications') }}</span>
                                    <x-tabler-bell class="h-6 w-6"/>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Notifications -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Recent Notifications') }}
                                </div>

                                <div class="border-t border-gray-100 dark:border-gray-600">
                                    <x-jet-dropdown-link href="{{ route('notifications.index') }}">
                                        {{ __('View All') }}
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>


                    <!-- Profile dropdown -->
                    <div class="ml-3 sm:flex sm:items-center">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                             src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}"/>
                                    </button>
                                @else
                                    <button
                                        class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 transition duration-150 ease-in-out hover:text-gray-700 dark:hover:text-white hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    <x-heroicon-o-user
                                        class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-300 dark:group-hover-text-white"/>
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100 dark:border-gray-600"></div>

                                <!-- Team Management -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team"/>
                                    @endforeach

                                    <div class="border-t border-gray-100"></div>
                            @endif

                            <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        <x-heroicon-o-logout
                                            class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 dark:text-gray-300 dark:group-hover-text-white"/>
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
            </div>
        </div>

        <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ $header ?? '' }}
                    </h1>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</div>

@stack('modals')

@livewireScripts

@bukScripts
</body>
</html>
