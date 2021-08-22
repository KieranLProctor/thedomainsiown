<?php

namespace App\Exports;

use App\Models\Domain;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class DomainExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Domain::query();
    }
}
