<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Domain;
use Livewire\Component;

class DomainTable extends Component
{
    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public Domain $domain;
    public bool $showingCreateModal = false;
    public bool $showingEditModal = false;
    public bool $showingDeleteModal = false;
    public $showFilters = false;
    public $filters = [
        'search' => '',
        'name' => '',
        'top_level_domain_id' => null,
        'registrar_id' => null,
        'registered_date' => null,
        'yearly_cost' => null,
        'will_autorenew' => null,
        'has_ssl_certificate' => null,
    ];

    protected $queryString = ['sorts'];

    protected $rules = [
        'domain.name' => ['required'],
        'domain.top_level_domain_id' => ['required'],
        'domain.registrar_id' => ['required'],
        'domain.registered_date' => ['required'],
        'domain.yearly_cost' => ['required'],
        'domain.will_autorenew' => ['required'],
        'domain.has_ssl_certificate' => ['required'],
    ];

//    public function exportSelected()
//    {
//        return response()->streamDownload(function () {
//            echo $this->selectedRowsQuery->toCsv();
//        }, 'domains_' . date() . '.csv');
//    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }

    public function showCreateModal()
    {
        $this->showingCreateModal = true;
    }

    public function showEditModal(Domain $domain)
    {
        $this->useCachedRows();

        if ($this->domain->isNot($domain)) $this->domain = $domain;

        $this->showingEditModal = true;
    }

    public function showDeleteModal(Domain $domain)
    {
        $this->domain = $domain;

        $this->showingDeleteModal = true;
    }

    public function createDomain()
    {
        $this->validate();
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

    public function getRowsQueryProperty()
    {
        $query = Domain::query()
            ->when($this->filters['name'], fn($query, $name) => $query->where('name', $name))
            ->when($this->filters['search'], fn($query, $search) => $query->where('name', 'like', '%'.$search.'%'));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
//        return view('livewire.domain-table', [
//            'domains' => Domain::search($this->search)
//                ->orderBy($this->sortField, $this->sortDirection)
//                ->paginate($this->perPage),
//        ]);

        return view('livewire.domain-table', [
            'domains' => $this->rows
        ]);
    }
}
