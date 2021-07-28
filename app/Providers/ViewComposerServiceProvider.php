<?php


namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {

        View::composer('system::admin.layouts._header', 'Modules\System\Http\ViewComposer\AdminComposer');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }
}
