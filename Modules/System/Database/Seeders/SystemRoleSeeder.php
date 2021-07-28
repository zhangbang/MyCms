<?php


namespace Modules\System\Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_system_role')->insert([
            'role_name' => '超级管理员',
            'role_desc' =>  '超级管理员',
            'role_node' =>  '["system\/index","system\/dashboard","system\/upload","system\/config","system\/admin","system\/admin\/modify","system\/admin\/create","system\/admin\/edit","system\/admin\/password","system\/admin\/destroy","system\/role","system\/role\/create","system\/role\/edit","system\/role\/destroy","system\/role\/auth","system\/menu","system\/menu\/create","system\/menu\/edit","system\/menu\/destroy"]',
            'status' =>  1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}