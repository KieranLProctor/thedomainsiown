<?php

namespace App\Http\Livewire;

use App\Models\Registrar;
use Livewire\Component;
use Livewire\WithPagination;

class RegistrarTable extends Component
{
    use WithPagination;

    public Registrar $registrar;
    public string $search = '';
    public string $sortField = 'name';
    public string $sortDirection = 'asc';
    public int $perPage = 25;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.registrar-table', [
            'registrars' => Registrar::search($this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
