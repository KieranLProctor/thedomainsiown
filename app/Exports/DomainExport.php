<?php

namespace App\Exports;

use App\Models\Domain;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class DomainExport implements FromQuery
{
    use Exportable;

    private array $ids;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        return Domain::query()->whereIn('id', $this->ids);
    }
}
