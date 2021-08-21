<?php


namespace Modules\System\Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdTime = Carbon::now()->toDateTimeString();
        DB::table('my_system_config')->insert([
            [
                'cfg_key' => 'site_name',
                'cfg_val' => 'MyCms',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'cfg_key' => 'site_url',
                'cfg_val' => 'http://www.mycms.net.cn/',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ], [
                'cfg_key' => 'site_logo',
                'cfg_val' => '/mycms/common/images/logo-1.png',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ], [
                'cfg_key' => 'site_icp',
                'cfg_val' => '粤ICP备20010675号',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ], [
                'cfg_key' => 'site_copyright',
                'cfg_val' => 'Copyright © MyCms',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ], [
                'cfg_key' => 'site_home_theme',
                'cfg_val' => 'default',
                'cfg_group' => 'system',
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ]
        ]);
    }
}
