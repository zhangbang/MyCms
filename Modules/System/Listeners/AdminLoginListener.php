<?php

namespace Modules\System\Listeners;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\System\Events\AdminLoginEvent;
use Modules\System\Models\Admin;

class AdminLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param AdminLoginEvent $event
     * @return void
     */
    public function handle(AdminLoginEvent $event)
    {
        Admin::where('name', $event->getName())->update([
            'login_num' => DB::raw('login_num + 1'),
            'last_login_time' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => get_client_ip()
        ]);
    }
}
