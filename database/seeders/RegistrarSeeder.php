<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class RegistrarSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/csvs/registrars.csv';
        $this->aliases = [
            'registrar_name' => 'name',
            'URL' => 'website_url',
            'RAA' => 'raa',
            'EMAIL' => 'email',
            'PHONE' => 'phone',
            'country_name' => 'country_id'
        ];
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
