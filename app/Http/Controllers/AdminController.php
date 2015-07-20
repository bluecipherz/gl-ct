<?php namespace App\Http\Controllers;

use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	protected $pages = [
		'Dashboard' => ['link' => '/admin/dashboard', 'partial' => 'dashboard'],
		'Products' => ['link' => '/admin/products', 'partial' => 'products'],
		'Ads' => ['link' => '/admin/ads', 'partial' => 'ads'],
		'Orders' => ['link' => '/admin/orders', 'partial' => 'orders'],
		'Customers' => ['link' => '/admin/customers', 'partial' => 'customers'],
		'Price Rules' => ['link' => '/admin/price-rules', 'partial' => 'price_rules'],
		'Shipping' => ['link' => '/admin/shipping', 'partial' => 'shipping'],
		'Preferences' => ['link' => '/admin/preferences', 'partial' => 'preferences'],
		'Administration' => ['link' => '/admin/administration', 'partial' => 'administration'],
		'Statistics' => ['link' => '/admin/statistics', 'partial' => 'statistics'],
	];
	
	protected $currentPage = 'dashboard'; // default

	public function __construct() {
		View::share('pages', $this->pages);
		View::share('currentPage', $this->currentPage);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function recieve($page)
	{
		$pageKey = ucfirst($page); // first letter caps
		if(array_key_exists($pageKey, $this->pages)) {
			return view('admin.main')->with('currentPage', $page);
		} else {
			abort(404);
		}
	}
	
}
