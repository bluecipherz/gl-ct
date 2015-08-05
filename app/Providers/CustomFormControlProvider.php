<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomFormControlProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        require base_path() . '/resources/macros/category_form_select_macro.php';
        require base_path() . '/resources/macros/ad_photo_upload_macro.php';
//        require base_path() . '/resources/macros/category_form_list_macro.php';
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
