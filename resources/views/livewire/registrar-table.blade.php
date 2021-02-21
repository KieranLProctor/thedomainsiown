<div>
    <div class="relative text-gray-600">
        <input class="shadow-sm border-gray-200 bg-white px-5 pr-16 rounded-lg text-sm focus:outline-none"
               type="search" name="search" placeholder="Search"
               wire:model="search">
        <button type="submit" class="relative right-0 top-0 mt-2.5 mr-4">
            <x-heroicon-o-search class="text-gray-600 h-5 w-5"/>
        </button>
    </div>

    <div class="flex flex-col">
        <div class="mt-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Email') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($registrars->isEmpty())
                            <tr>
                                <td colspan="6"
                                    class="text-sm font-medium whitespace-nowrap text-center px-6 py-4 text-gray-700">
                <span>
                    {{ __('There doesn\'t appear to be any registrars') }}
                </span>
                                </td>
                            </tr>
                        @else
                            @foreach($registrars as $registrar)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $registrar->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $registrar->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium items-center">
                                        <a href="{{ route('registrars.show', $registrar) }}"
                                           class="text-gray-600 hover:text-gray-900">
                                            <x-heroicon-o-eye class="h-5 w-5"/>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        {{ $registrars->links('livewire.pagination-link') }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
