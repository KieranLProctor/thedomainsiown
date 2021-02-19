<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;
use Livewire\WithPagination;

class DomainTable extends Component
{
    use WithPagination;

    public $domain;

    /**
     * Indicates if domain deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingDomainDeletion = false;

    /**
     * Confirm that the user would like to delete the domain.
     *
     * @return void
     */
    public function confirmDomainDeletion(Domain $domain)
    {
        $this->domain = $domain;

        $this->confirmingDomainDeletion = true;
    }

    /**
     * Delete the current domain.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteDomain()
    {
        Domain::find($this->domain->id)->delete();

        return redirect()->route('domains.index');
    }

    public function render()
    {
        return view('livewire.domain-table', [
            'domains' => Domain::paginate(100)
        ]);
    }
}
