<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;
use Livewire\WithPagination;

class DomainTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.domain-table', [
            'domains' => Domain::paginate(100)
        ]);
    }
}
