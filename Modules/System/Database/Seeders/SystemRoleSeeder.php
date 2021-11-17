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
            'role_node' =>  '["article\/admin\/category","article\/admin\/category\/edit","article\/admin\/category\/create","article\/admin\/category\/destroy","article\/admin","article\/admin\/create","article\/admin\/edit","article\/admin\/destroy","article\/admin\/tags","article\/admin\/tag","article\/admin\/tag\/edit","article\/admin\/tag\/create","article\/admin\/tag\/destroy","article\/admin\/comment","article\/admin\/comment\/config","article\/admin\/comment\/modify","article\/admin\/comment\/destroy","shop\/admin\/category","shop\/admin\/category\/edit","shop\/admin\/category\/create","shop\/admin\/category\/destroy","shop\/admin\/goods","shop\/admin\/goods\/edit","shop\/admin\/goods\/create","shop\/admin\/goods\/destroy","shop\/admin\/pay\/logs","system\/index","system\/dashboard","system\/upload","system\/config","system\/admin","system\/admin\/modify","system\/admin\/create","system\/admin\/edit","system\/admin\/password","system\/admin\/destroy","system\/role","system\/role\/create","system\/role\/edit","system\/role\/destroy","system\/role\/auth","system\/menu","system\/menu\/create","system\/menu\/edit","system\/menu\/destroy","system\/addon","system\/addon\/install","system\/addon\/uninstall","system\/addon\/init","user\/admin","user\/admin\/create","user\/admin\/edit","user\/admin\/password","user\/admin\/modify","user\/admin\/destroy","user\/admin\/account","user\/admin\/balance","user\/admin\/point"]',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
