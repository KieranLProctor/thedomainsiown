<div>
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
                <td colspan="6" class="text-sm font-medium whitespace-nowrap text-center px-6 py-4 text-gray-700">
                <span>
                    {{ __('There doesn\'t appear to be any registrars') }}
                </span>
                </td>
            </tr>
        @else
            @foreach($registrars as $registrar)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $registrar->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            {{ $registrar->email }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex flex-row gap-2 items-center">
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
