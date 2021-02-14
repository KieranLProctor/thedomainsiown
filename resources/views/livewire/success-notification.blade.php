<div>
    <div x-data="{ show: true }"
         x-show="show"
         x-description="Notification panel, show/hide based on alert state."
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="show = false;"
         class="max-w-sm w-full absolute z-50 right-2 top-3 bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <x-heroicon-o-check-circle class="h-6 w-6 text-green-400"/>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">
                        Success!
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ session('message') }}
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false;"
                            class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Close</span>
                        <x-heroicon-s-x class="h-5 w-5"/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
