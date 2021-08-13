<?php


namespace Expand\Addon\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Support\Facades\Storage;

class AddonEventServiceProvider extends EventServiceProvider
{

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
            Storage::disk('root')->directories('Addons')
        )->map(function ($item){
            return base_path("{$item}/Listeners");
        })->toArray();
    }
}
