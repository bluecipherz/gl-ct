<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers
		$this->app->view->composer('layouts.admin', 'App\Http\ViewComposers\AdminPanelComposer');
        $this->app->view->composer('admin.sidebar', 'App\Http\ViewComposers\SidebarComposer');
        $this->app->view->composer('admin.main', 'App\Http\ViewComposers\AdminComposer');
        $this->app->view->composer('home', 'App\Http\ViewComposers\HomeComposer');
        $this->app->view->composer('layouts.core', 'App\Http\ViewComposers\CoreComposer');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
