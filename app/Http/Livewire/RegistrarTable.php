<?php

namespace App\Http\Livewire;

use App\Exports\RegistrarExport;
use App\Models\Registrar;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RegistrarTable extends DataTableComponent
{
    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public bool $columnSelect = true;

    protected string $pageName = 'registrars';
    protected string $tableName = 'registrars';

    public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0) {
            return (new RegistrarExport($this->selectedRowsQuery))->download($this->tableName . '.xlsx');
        }
    }

    public function deleteSelected()
    {
        // Delete the rows.
        if (count($this->selectedKeys)) {
            // Add a confirmation box here.
            Registrar::destroy($this->selectedKeys);

            $this->resetAll();
        }
    }

    public function getTableRowUrl($row): string
    {
        return route('registrars.show', $row);
    }

    public function filters(): array
    {
        return [
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Website', 'website_url')
                ->sortable(),
            Column::make('Email')
                ->sortable(),
            Column::make('IANA Id', 'iana_id')
                ->sortable(),
            Column::make('RAA', 'raa')
                ->sortable(),
            Column::make('Phone')
                ->sortable(),
            Column::make('Country', 'countries.name')
                ->sortable(),
            Column::make('Actions'),
        ];
    }

    public function query(): Builder
    {
        return Registrar::query();
    }
}
