<?php


namespace Modules\Cms\Listeners;


use Illuminate\Support\Facades\DB;
use Modules\Cms\Events\ViewEvent;
use Modules\Cms\Models\Article;

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
        Article::where('id', $event->getId())->update([
            'view' => DB::raw('view + 1'),
        ]);
    }
}
