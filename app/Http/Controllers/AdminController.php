<?php namespace App\Http\Controllers;

use DB;
use View;
use App\Category;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 *	ADMIN ROUTE DEFINITIONS
	 */
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

	public function __construct() {
		View::share('pages', $this->pages);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function recieve($page = null)
	{
		// reroute to dashboard if $page is null
		if($page == null) {
			return redirect('/admin/dashboard');
		}
		$pageKey = ucfirst($page); // first letter caps
		// check if page exists in $pages array
		if(array_key_exists($pageKey, $this->pages)) {
			/**
			 * ADMIN ROUTES
			 */
			if($page == 'products') {
				// retrieve all products, categories, sub-categories and post-sub-categories
				$products = Product::all()->where('reseller', 0);
				$_cats = Category::all();
				$_subcats = DB::table('sub_categories')->get();
				$_postsubcats = DB::table('post_sub_cats')->get();
				
				/*
				 * SHIFT EACH KEY OF EACH ARRAY BY ONE (ADD 1)
				 */
				
				$cats = [];
				$subcats = [];
				$postsubcats = [];
				
				foreach($_cats as $cat) {
					$cats[$cat->id] = $cat->name;
				}
				foreach($_subcats as $cat) {
					$subcats[$cat->id] = $cat->name;
				}
				foreach($_postsubcats as $cat) {
					$postsubcats[$cat->id] = $cat->name;
				}
				
				/* END SHIFT */
				
				return view('admin.main')
						->with('currentPage', $page)
						->with('products', $products)
						->with('cats', $cats)
						->with('subcats', $subcats)
						->with('postsubcats', $postsubcats);
			} else if($page == 'categories') {
				$cats = Category::all()->lists('name');
				$_subcats = DB::table('sub_categories')->get();
				$_postsubcats = DB::table('post_sub_cats')->get();
				
				$subcats = [];
				$postsubcats = [];
				
				foreach($_subcats as $cat) {
					$subcats[$cat->id] = $cat->name;
				}
				foreach($_postsubcats as $cat) {
					$postsubcats[$cat->id] = $cat->name;
				}
				
				
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
