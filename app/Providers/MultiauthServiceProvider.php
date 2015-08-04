<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ollieread\Multiauth\MultiManager;

class MultiauthServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        echo 'ok';
        $this->app->singleton('auth', function ($app) {
            // Once the authentication service has actually been requested by the developer
            // we will set a variable in the application indicating such. This helps us
            // know that we need to set any queued cookies in the after event later.
            $app['auth.loaded'] = true;

            return new MultiManager($app);
        });


        $this->app->singleton('auth.driver', function($app)
        {
            return $app['auth']->driver();
        });
	}

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['auth'];
    }

}
