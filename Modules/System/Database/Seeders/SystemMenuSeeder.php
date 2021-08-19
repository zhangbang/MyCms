<?php


namespace Modules\System\Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdTime = Carbon::now()->toDateTimeString();
        DB::table('my_system_menu')->insert([
            [
                'pid' => 0,
                'title' => '系统模块',
                'icon' => 'fa fa-windows',
                'url' => '',
                'target' => '',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],
            [
                'pid' => 1,
                'title' => '系统配置',
                'icon' => 'fa fa-cog',
                'url' => '/system/config',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],
            [
                'pid' => 1,
                'title' => '管理员管理',
                'icon' => 'fa fa-user',
                'url' => '/system/admin',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],
            [
                'pid' => 1,
                'title' => '角色管理',
                'icon' => 'fa fa-bitbucket-square',
                'url' => '/system/role',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 1,
                'title' => '菜单管理',
                'icon' => 'fa fa-bars',
                'url' => '/system/menu',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 1,
                'title' => '插件管理',
                'icon' => 'fa fa-plus-square',
                'url' => '/system/addon',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 0,
                'title' => '用户模块',
                'icon' => 'fa fa-users',
                'url' => '',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 7,
                'title' => '用户管理',
                'icon' => 'fa fa-users',
                'url' => '/user/admin/',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 7,
                'title' => '余额明细',
                'icon' => 'fa fa-money',
                'url' => '/user/admin/balance',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],[
                'pid' => 7,
                'title' => '积分明细',
                'icon' => 'fa fa-database',
                'url' => '/user/admin/point',
                'target' => '_self',
                'sort' => 0,
                'created_at' => $createdTime,
                'updated_at' => $createdTime,
            ],
        ]);
    }
}
