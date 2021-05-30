<div>
    <div class="py-4 space-y-4">
        <div>
            <div class="flex flex-row space-x-2">
                <div>
                    <select wire:model="perPage"
                            class="shadow-sm border-gray-300 bg-white pl-3 pr-10 h-auto rounded-lg text-sm focus:ring-gray-900 focus:border-gray-900">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>250</option>
                    </select>
                </div>
                <div class="w-1/4">
                    <x-input.text wire:model="search" placeholder="Search..."/>
                </div>
            </div>
        </div>

        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable
                                     wire:click="sortBy('name')"
                                     :direction="$sortField === 'name' ? $sortDirection : null">
                        Name
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('email')"
                                     :direction="$sortField === 'email' ? $sortDirection : null">
                        Email
                    </x-table.heading>
                    <x-table.heading>Actions</x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse($registrars as $registrar)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell>{{ $registrar->name }}</x-table.cell>
                            <x-table.cell>{{ $registrar->email }}</x-table.cell>
                            <x-table.cell class="flex items-center space-x-2">
                                <a href="{{ route('registrars.show', $registrar) }}"
                                   class="text-gray-600 hover:text-gray-900">
                                    <span class="sr-only">{{ __('View') }}</span>
                                    <x-heroicon-o-eye class="h-5 w-5"/>
                                </a>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="3">
                                <div class="flex justify-center items-center">
                                    <span
                                        class="text-xl text-gray-400 py-8 font-medium">{{ __('No registrars found...') }}</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{ $registrars->links('livewire.pagination-link') }}
            </div>
        </div>
    </div>
</div>
