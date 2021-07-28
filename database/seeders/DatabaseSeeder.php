<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\System\Database\Seeders\SystemAdminSeeder;
use Modules\System\Database\Seeders\SystemConfigSeeder;
use Modules\System\Database\Seeders\SystemMenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SystemAdminSeeder::class);
        $this->call(SystemConfigSeeder::class);
        $this->call(SystemMenuSeeder::class);
    }
}
