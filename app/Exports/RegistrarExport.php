<?php

namespace App\Exports;

use App\Models\Registrar;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class RegistrarExport implements FromQuery
{
    use Exportable;

    private array $ids;

    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        return Registrar::query()->whereIn('id', $this->ids);
    }
}
