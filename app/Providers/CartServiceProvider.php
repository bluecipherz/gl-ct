<?php namespace app\Providers;
use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 6:14 PM
 */


class CartServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('view')->composer('layouts.core', 'App\Http\ViewComposer\CartComposer');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }
}