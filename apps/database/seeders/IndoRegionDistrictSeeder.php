<?php

namespace Database\Seeders;

use AzisHapidin\IndoRegion\RawDataGetter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndoRegionDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get Data
        $districts = RawDataGetter::getDistricts();

        // Insert Data to Database
        DB::table('indoregion_districts')->insert($districts);
    }
}
