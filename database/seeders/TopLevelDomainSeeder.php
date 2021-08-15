<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class TopLevelDomainSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/csvs/tlds.csv';
        $this->tablename = 'top_level_domains';
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
