<div>
    <div class="py-4 space-y-4">
        <div>
            <div class="w-1/4">
                <x-jet-input class="block w-full" wire:model="search" placeholder="Search Domains..."></x-jet-input>
            </div>
        </div>

        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading sortable
                                     wire:click="sortBy('name')"
                                     :direction="$sortField === 'name' ? $sortDirection : null">Name
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('name')"
                                     :direction="$sortField === 'name' ? $sortDirection : null">Registrar
                    </x-table.heading>
                    <x-table.heading sortable
                                     wire:click="sortBy('name')"
                                     :direction="$sortField === 'name' ? $sortDirection : null">Registered Date
                    </x-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse($domains as $domain)
                        <x-table.row wire:loading.class.delay="opacity-50">
                            <x-table.cell>{{ $domain->full_domain }}</x-table.cell>
                            <x-table.cell>{{ $domain->registrar->name }}</x-table.cell>
                            <x-table.cell>
                                <x-carbon :date="$domain->registered_date" format="d M Y"/>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="3">
                                <div class="flex justify-center items-center">
                                    <span
                                        class="text-xl text-gray-400 py-8 font-medium">{{ __('No domains found...') }}</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{ $domains->links('livewire.pagination-link') }}
            </div>
        </div>
    </div>
</div>
