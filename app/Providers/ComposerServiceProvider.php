<?php namespace App\Providers;

use App\Models\DeliveryOption;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\DeviceComposer');
    }
}
