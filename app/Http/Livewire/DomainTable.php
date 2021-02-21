<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;
use Livewire\WithPagination;

class DomainTable extends Component
{
    use WithPagination;

    public Domain $domain;
    public string $search = '';
    public int $perPage = 25;

    /**
     * Indicates if domain deletion is being confirmed.
     *
     * @var bool
     */
    public $showingDomainDelete = false;

    /**
     * Confirm that the user would like to delete the domain.
     *
     * @return void
     */
    public function showDomainDelete(Domain $domain)
    {
        $this->domain = $domain;

        $this->showingDomainDelete = true;
    }

    /**
     * Delete the current domain.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteDomain()
    {
        Domain::find($this->domain->id)->delete();

        $this->showingDomainDelete = false;

        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.domain-table', [
            'domains' => Domain::search($this->search)
                ->paginate($this->perPage)
        ]);
    }
}
