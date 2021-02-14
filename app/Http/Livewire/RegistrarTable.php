<?php

namespace App\Http\Livewire;

use App\Models\Registrar;
use Livewire\Component;
use Livewire\WithPagination;

class RegistrarTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.registrar-table', [
            'registrars' => Registrar::paginate(100)
        ]);
    }
}
