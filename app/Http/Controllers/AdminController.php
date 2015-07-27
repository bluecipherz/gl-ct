<?php namespace App\Http\Controllers;

use DB;
use View;
use App\Category;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	protected $pages = [
		'Dashboard' => ['link' => '/admin/dashboard', 'partial' => 'dashboard'],
		'Products' => ['link' => '/admin/products', 'partial' => 'products'],
		'Categories' => ['link' => '/admin/categories', 'partial' => 'categories'],
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
			if($page == 'products') {
				$products = Product::all();
				$_cats = Category::all();
				$_subcats = DB::table('sub_categories')->where('category_id', $_cats->first()->id);
				$_postsubcats = DB::table('post_sub_cats')->where('sub_category_id', $_subcats->first()->id);
				
				$cats = $_cats->lists('name');
				$subcats = $_subcats->lists('name');
				$postsubcats = $_postsubcats->lists('name');
				
				/*
				 * SHIFT EACH KEY OF EACH ARRAY BY ONE (ADD 1)
				 */
				
				array_unshift($cats, null);
				unset($cats[0]);
				
				array_unshift($subcats, null);
				unset($subcats[0]);
				
				array_unshift($postsubcats, null);
				unset($postsubcats[0]);
				
				/* END SHIFT */
				
				return view('admin.main')
						->with('currentPage', $page)
						->with('products', $products)
						->with('cats', $cats)
						->with('subcats', $subcats)
						->with('postsubcats', $postsubcats);
			} else if($page == 'categories') {
				$cats = Category::all()->lists('name');
				$subcats = DB::table('sub_categories')->lists('name');
				$postsubcats = DB::table('post_sub_cats')->lists('name');
				return view('admin.main')
						->with('currentPage', $page)
						->with('cats', $cats)
						->with('subcats', $subcats)
						->with('postsubcats', $postsubcats);
			} else {
				return view('admin.main')->with('currentPage', $page);
			}
		} else {
			abort(404);
		}
	}
	
}
