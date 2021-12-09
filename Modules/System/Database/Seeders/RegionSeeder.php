<?php


namespace Modules\System\Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(module_path("System","/Database/Seeders/my_region.sql")));
    }
}
