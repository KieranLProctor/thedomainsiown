<div>
    <div class="flex justify-between">
        <div class="flex flex-row space-x-2">
            <select wire:model="perPage"
                    class="shadow-sm border-gray-200 bg-white pl-3 pr-10 h-auto rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
                <option>250</option>
            </select>

            <div class="mt-0.5 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none
text-gray-400 focus-within:text-gray-600">
                    <x-heroicon-o-search class="h-5 w-5"/>
                </div>
                <input name="search"
                       type="text"
                       placeholder="Search"
                       wire:model.debounce.300ms="search"
                       class="focus:ring-gray-900 focus:border-gray-900 block w-full pl-10 sm:text-sm border-gray-200 rounded-lg">
            </div>
        </div>
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
