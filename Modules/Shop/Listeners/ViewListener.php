<?php


namespace Modules\Shop\Listeners;


use Illuminate\Support\Facades\DB;
use Modules\Shop\Events\ViewEvent;
use Modules\Shop\Models\Goods;

class ViewListener
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
     * @param ViewEvent $event
     * @return void
     */
    public function handle(ViewEvent $event)
    {
        Goods::where('id', $event->getId())->update([
            'view' => DB::raw('view + 1'),
        ]);
    }
}
