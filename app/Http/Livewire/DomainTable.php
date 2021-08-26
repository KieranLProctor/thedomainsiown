<?php

namespace App\Http\Livewire;

use App\Exports\DomainExport;
use App\Exports\UserExport;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Domain;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class DomainTable extends DataTableComponent
{
    public array $bulkActions = [
        'importRecords' => 'Import',
        'exportSelected' => 'Export',
        'deleteSelected' => 'Delete',
    ];

    public bool $columnSelect = true;

    protected string $pageName = 'domains';
    protected string $tableName = 'domains';

    public function exportSelected()
    {
        if ($this->selectedRowsQuery->count() > 0) {
            notify()->success('Laravel Notify is awesome!');

            //return (new DomainExport($this->selectedKeys))->download($this->tableName . '.xlsx');
        }
    }

    public function deleteSelected()
    {
        // Delete the rows.
        if (count($this->selectedKeys)) {
            // Add a confirmation box here.
            Domain::destroy($this->selectedKeys);

            $this->resetAll();
        }
    }

    public function getTableRowUrl($row): string
    {
        return route('domains.show', $row);
    }

    public function filters(): array
    {
        return [
            'autoRenew' => Filter::make('Auto-Renews')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
            'ssl' => Filter::make('SSL Certificate')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Registrar', 'registrar.name')
                ->sortable()
                ->searchable(),
            Column::make('Registered Date')->sortable(),
            Column::make('Yearly Cost')->sortable(),
            Column::make('Auto-Renews?', 'will_autorenew')->sortable(),
            Column::make('SSL Certificate?', 'has_ssl_certificate')->sortable(),
            Column::make('Actions'),
        ];
    }

    public function query(): Builder
    {
        return Domain::query();
    }
}
