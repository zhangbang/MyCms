<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Storage;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * 确定是否应自动发现事件和侦听器
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }

    /**
     * 获取应该用于发现事件的监听器的目录
     *
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return collect(
            Storage::disk('root')->directories('Modules')
        )->map(function ($item){
            return base_path("{$item}/Listeners");
        })->toArray();
    }
}
