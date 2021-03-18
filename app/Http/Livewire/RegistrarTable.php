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
    public int $perPage = 25;

    public function render()
    {
        $registrars = !empty($this->search) ? Registrar::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage) : Registrar::paginate($this->perPage);

        return view('livewire.registrar-table', [
            'registrars' => $registrars
        ]);
    }
}
