<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;
use Livewire\WithPagination;

class DomainTableNew extends Component
{
    use WithPagination;

    public Domain $domain;
    public string $search = '';
    public string $sortField = 'name';
    public string $sortDirection = 'asc';
    public int $perPage = 25;
    public bool $showingEditModal = false;
    public bool $showingDeleteModal = false;

    protected $rules = [
        'domain.name' => ['required'],
        'domain.top_level_domain_id' => ['required'],
        'domain.registrar_id' => ['required'],
        'domain.registered_date' => ['required'],
        'domain.yearly_cost' => ['required'],
        'domain.will_autorenew' => ['required'],
        'domain.has_ssl_certificate' => ['required'],
    ];

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
        return view('livewire.domain-table-new', [
            'domains' => Domain::search($this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }

    public function showEditModal(Domain $domain)
    {
        $this->domain = $domain;

        $this->showingEditModal = true;
    }

    public function showDeleteModal(Domain $domain)
    {
        $this->domain = $domain;

        $this->showingDeleteModal = true;
    }

    public function saveDomain()
    {
        $this->validate();

        $this->domain->save();

        $this->showingEditModal = false;

        $this->emit('refresh');
    }

    public function deleteDomain()
    {
        $this->domain->delete();

        $this->showingDeleteModal = false;

        $this->emit('refresh');
    }
}
