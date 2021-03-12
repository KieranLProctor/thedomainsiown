<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<body class="font-sans">
<div id="content">
    <div>
        <main class="bg-black text-gray-200 font-medium">
            <!-- header block -->
            <div class="bg-gray-900">
                <header class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 py-4 lg:py-6 flex justify-between">
                    <a href="#">
                        <span class="sr-only">SaaS landing page</span>
                        <h1 class="text-2xl">The Domains I Own</h1>
                    </a>
                    <nav class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="flex space-x-1 items-center hover:text-white">
                            <x-tabler-user class="hidden sm:inline w-5 h-5"/>
                            <span>Sign in</span>
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-block bg-gradient-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-700 font-semibold rounded-lg py-2 px-5 text-white ">Sign
                            up</a>
                    </nav>
                </header>
            </div>
            <!--/ header block -->

            <div class="py-12 md:py-24 bg-gradient-to-b from-gray-900 to-black">
                <div
                    class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 grid md:grid-cols-4 xl:grid-cols-5 gap-x-12 lg:gap-x-20">
                    <div class="order-2 md:order-1 col-span-2 self-center mt-12 md:mt-0">
                        <h1 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold mb-2 md:mb-4 lg:mb-8">The best
                            way to track your domains</h1>
                        <p class="text-lg xl:text-xl text-gray-200 mb-6 lg:mb-8 xl:mb-10">Have a habit of buying domain names and forgetting about them? Sign up now to start tracking.</p>
                        <div class="flex space-x-4 mb-6">
                            <input type="text" placeholder="enter your email..."
                                   class="flex-1 py-4 px-4 border border-gray-200 rounded-lg leading-none focus:outline-none">
                            <button
                                class="focus:outline-none inline-block bg-gradient-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-700 font-semibold rounded-lg py-2 px-5  text-white ">
                                Get started
                            </button>
                        </div>
                        <p class="text-gray-400 text-sm">No credit card required. Cancel anytime.</p>
                    </div>
                    <div class="order-1 md:order-2 col-span-2 xl:col-span-3">
                        <img src="./images/hero-image-dark.png" class="rounded-lg shadow-2xl" alt="">
                    </div>
                </div>
            </div>

            <!-- logo block -->
            <div class="py-12 lg:pb-16 bg-black mb-12 lg:mb-16  ">
                <div
                    class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 grid grid-cols-2 sm:grid-cols-3 space-y-5 sm:space-y-3 xl:grid-cols-6 col-gap-6 opacity-95">
                    <img class="h-12 p-1 self-end justify-self-center" src="./images/boxify-logo-dark.svg" alt="">
                    <img class="h-10 p-1 self-end justify-self-center" src="./images/edge-logo-dark.svg" alt="">
                    <img class="h-10 p-1 self-end justify-self-center" src="./images/sbalbew-logo-dark.svg" alt="">
                    <img class="h-10 p-1 self-end justify-self-center" src="./images/drops-logo-dark.svg" alt="">
                    <img class="h-12 p-1 self-end justify-self-center" src="./images/pathway-logo-dark.svg" alt="">
                    <img class="h-10 p-1 self-end justify-self-center" src="./images/feedback-logo-dark.svg" alt="">
                </div>
            </div>
            <!--/ logo block -->

            <!-- pricing block -->
            <div class="bg-gradient-to-b from-black to-gray-900">
                <div class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 pb-12 lg:pb-16 xl:pb-24">
                    <div class="text-center mb-6 md:mb-8">
                        <h2 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold mb-2 md:mb-4">For Freelancers
                            and Teams</h2>
                        <p class="text-lg xl:text-xl text-gray-200">We offer 100% money back guarantee.</p>
                    </div>

                    <div class="flex justify-center mb-8 md:mb-20 lg:mb-24">
                        <nav class="inline-flex bg-indigo-100 rounded-lg overflow-hidden text-sm">
                            <button
                                class="font-bold focus:outline-none py-3 px-6 bg-gradient-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-700 text-white">
                                Pay Monthly
                            </button>
                            <button class="font-bold focus:outline-none py-3 px-6 text-indigo-500 hover:bg-indigo-50">
                                Pay Yearly
                            </button>
                        </nav>
                    </div>

                    <div class="grid md:grid-cols-3 gap-x-8 gap-y-8 items-start">
                        <div class="p-4 md:p-8  rounded-lg bg-gray-900">
                            <div class="flex justify-between items-baseline mb-4">
                                <h4 class="text-xl lg:text-2xl font-bold">Free Package</h4>
                                <span class="text-xl lg:text-2xl font-bold">&euro;0</span>
                            </div>
                            <p class="text-gray-200 mb-6 text-lg">Wisdom is easily acquired when hiding under the bed
                                with.</p>
                            <a href="#"
                               class="border border-gray-700 rounded-lg block text-center py-3 px-5 lg:px-8 font-bold mb-8 bg-gradient-to-br hover:from-indigo-500 hover:to-indigo-700 hover:text-white">Start
                                for free</a>
                            <ul class="text-gray-200 space-y-4 text-lg">
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>30 Downloads</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>5 Users</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>10 Credits</span>
                                </li>
                                <li class="flex space-x-2 items-center opacity-25">
                                    <div class="w-6 h-6">
                                        &nbsp;
                                    </div>
                                    <span>60 day history</span>
                                </li>
                                <li class="flex space-x-2 items-center opacity-25">
                                    <div class="w-6 h-6">
                                        &nbsp;
                                    </div>
                                    <span>Email Support</span>
                                </li>
                                <li class="flex space-x-2 items-center opacity-25">
                                    <div class="w-6 h-6">
                                        &nbsp;
                                    </div>
                                    <span>Phone Support</span>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="p-4 md:p-8 lg:py-12 md:transform md:-translate-y-10 md:-mb-10 bg-gray-900 rounded-lg md:shadow-md md:hover:shadow-xl md:transition-all md:duration-500 border-2 md:border border-black">
                            <div class="flex justify-between items-baseline mb-4">
                                <h4 class="text-xl lg:text-2xl font-bold">Pro Package</h4>
                                <span class="text-xl lg:text-2xl font-bold">&euro;49</span>
                            </div>
                            <p class="text-gray-200 mb-6 text-lg">Wisdom is easily acquired when hiding under the bed
                                with.</p>
                            <a href="#"
                               class="border border-gray-700 rounded-lg block text-center py-3 px-5 lg:px-8 font-bold bg-gradient-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-700  text-white mb-8">Start
                                for free</a>
                            <ul class="text-gray-200 space-y-4 text-lg">
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Downloads</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Users</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Credits</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>60-day history</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Chat Support</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Email Support</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Phone Support</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-4 md:p-8  rounded-lg bg-gray-900">
                            <div class="flex justify-between items-baseline mb-4">
                                <h4 class="text-xl lg:text-2xl font-bold">Plus Package</h4>
                                <span class="text-xl lg:text-2xl font-bold">&euro;29</span>
                            </div>
                            <p class="text-gray-200 mb-6 text-lg">Wisdom is easily acquired when hiding under the bed
                                with.</p>
                            <a href="#"
                               class="border border-gray-700 rounded-lg block text-center py-3 px-5 lg:px-8 font-bold mb-8 bg-gradient-to-br hover:from-indigo-500 hover:to-indigo-700 hover:text-white">Start
                                for free</a>
                            <ul class="text-gray-200 space-y-4 text-lg">
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Downloads</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Users</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>Unlimited Credits</span>
                                </li>
                                <li class="flex space-x-2 items-center">
                                    <div class="w-6 h-6">
                                        <svg class="text-green-500" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span>60-day history</span>
                                </li>
                                <li class="flex space-x-2 items-center opacity-25">
                                    <div class="w-6 h-6">
                                        &nbsp;
                                    </div>
                                    <span>Email Support</span>
                                </li>
                                <li class="flex space-x-2 items-center opacity-25">
                                    <div class="w-6 h-6">
                                        &nbsp;
                                    </div>
                                    <span>Phone Support</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ pricing block -->

            <!-- rating block -->
            <div class="bg-gray-900">
                <div class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 pb-12 lg:pb-16 xl:pb-24">
                    <div class="flex flex-col justify-center items-center">
                        <div
                            class="bg-yellow-50 rounded-lg border border-yellow-200 py-4 lg:py-8 px-4 md:px-12 w-full md:w-auto flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 lg:space-x-12">
                            <div>
                                <p class="trakcing-wide uppercase font-bold text-gray-800 text-lg lg:text-xl">4.9
                                    Overall rating</p>
                                <p class="text-base lg:text-lg text-gray-600">Serving 3000 companies world wide</p>
                            </div>
                            <div class="text-yellow-400 flex space-x-2">
                                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                                <svg class="w-6 h-6" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ rating block -->

            <!-- faq block -->
            <div class="bg-gray-900 pb-12 lg:pb-20 relative overflow-hidden">
                <div class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 relative z-20">
                    <div class="text-center mb-6 md:mb-8 lg:mb-12">
                        <h2 class="text-white text-3xl md:text-4xl lg:text-5xl font-bold mb-2 md:mb-4">FAQ</h2>
                        <p class="text-lg xl:text-xl text-gray-200">Ask us anything about our product.</p>
                    </div>
                    <div class="mb-12 lg:mb-20">
                        <ul class="divide-y divide-gray-600 text-base md:text-lg">
                            <li>
                                <button
                                    class="py-3 lg:py-4 font-bold focus:outline-none hover:text-indigo-700 w-full flex items-center justify-between">
              <span class="flex-1 text-left pr-6">
                What companies or products do you perceive as our competitors?
              </span>
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button
                                    class="py-3 lg:py-4 font-bold focus:outline-none hover:text-indigo-700 w-full flex items-center justify-between">
              <span class="flex-1 text-left pr-6">
                Have you seen, read or heard anything in the news and on social media?
              </span>
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button
                                    class="py-3 lg:py-4 font-bold focus:outline-none hover:text-indigo-700 w-full flex items-center justify-between">
              <span class="flex-1 text-left pr-6">
                Do you identify with any of the people appearing in this advert?
              </span>
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button
                                    class="py-3 lg:py-4 font-bold focus:outline-none hover:text-indigo-700 w-full flex items-center justify-between">
              <span class="flex-1 text-left pr-6">
                If you could change one thing about the advert you’ve just seen/heard, what would it be?
              </span>
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button
                                    class="py-3 lg:py-4 font-bold focus:outline-none hover:text-indigo-700 w-full flex items-center justify-between">
              <span class="flex-1 text-left pr-6">
                Who else would you like to see appear in this advert?
              </span>
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8 lg:gap-12  ">
                        <a href="#"
                           class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow hover:shadow-xl transition-all duration-500 p-6 lg:p-8  flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                            <div
                                class="h-16 w-16 lg:h-20 lg:w-20 bg-green-100 rounded-full flex items-center justify-center border border-green-200 shadow-inner">
                                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-bold text-xl lg:text-2xl mb-3">Compare Plans</h5>
                                <p class="text-lg text-gray-200 mb-6">Find out what plan is right for you</p>
                                <span class="font-bold text-lg text-indigo-600 flex items-baseline">
              View price comparison
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </span>
                            </div>
                        </a>
                        <a href="#"
                           class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow hover:shadow-xl transition-all duration-500 p-6 lg:p-8  flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
                            <div
                                class="h-16 w-16 lg:h-20 lg:w-20 bg-green-100 rounded-full flex items-center justify-center border border-green-200 shadow-inner">
                                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-bold text-xl lg:text-2xl mb-3">Need advice?</h5>
                                <p class="text-lg text-gray-200 mb-6">Find out what plan is right for you</p>
                                <span class="font-bold text-lg text-indigo-600 flex items-baseline">
              Contact our professionals
              <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--/ faq block -->

            <!-- footer block -->
            <footer class="bg-gray-900 text-gray-200 py-12 xl:pb-24">
                <div class="max-w-screen-xl text-xl mx-auto px-6 lg:px-8 xl:px-4 mb-12 lg:mb-16">
                  The Domains I Own
                </div>
                <div
                    class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 grid md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-x-8">
                    <div>
                        <h5 class="text-xl font-bold text-gray-300">Product</h5>
                        <nav class="mt-4">
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Landingpages</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Features</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Showcase</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        <h5 class="text-xl font-bold text-gray-300">Industries</h5>
                        <nav class="mt-4">
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Employment</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Childcare</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Dealerships</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        <h5 class="text-xl font-bold text-gray-300">About us</h5>
                        <nav class="mt-4">
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Company</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Download brochure</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Resources</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div>
                        <h5 class="text-xl font-bold text-gray-300">Legal</h5>
                        <nav class="mt-4">
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Terms and conditions</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Security</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base hover:text-gray-500">Privacy</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div
                    class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 flex flex-col md:flex-row justify-between items-center space-y-4 mt-16 lg:mt-20">
                    <div class="text-sm space-y-4 md:space-y-1 text-center md:text-left">
                        <p>&copy;2020 Company. All rights reserved. | All rights reserved</p>
                        <p>Wisdom is easily acquired when hiding under the bed with a saucepan on your head.</p>
                    </div>
                    <a href="#"
                       class="inline-block bg-gradient-to-br from-indigo-600 to-indigo-700 hover:from-indigo-500 hover:to-indigo-700 font-semibold rounded-lg py-4 px-5 lg:px-8 text-white md:transform md:-translate-y-2">Start
                        your free trial</a>
                </div>
                <div
                    class="max-w-screen-xl mx-auto px-6 lg:px-8 xl:px-4 flex flex-col md:flex-row justify-between items-center space-y-4 mt-8 lg:mt-12">
                    <nav class="flex flex-wrap justify-center space-x-6">
                        <a href="#" class=" text-sm hover:text-gray-700 mb-2">Privacy</a>
                        <a href="#" class=" text-sm hover:text-gray-700 mb-2">Content Terms Notice</a>
                        <a href="#" class=" text-sm hover:text-gray-700 mb-2">Legal</a>
                        <a href="#" class=" text-sm hover:text-gray-700 mb-2">Features</a>
                        <a href="#" class=" text-sm hover:text-gray-700 mb-2">Landing Pages</a>
                    </nav>
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="text-gray-500 hover:text-gray-200">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-200">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-200">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                    </nav>
                </div>
            </footer>
            <!--/ footer block -->
        </main>
    </div>
</div>

@stack('modals')

@livewireScripts

@bukScripts
</body>
</html>
