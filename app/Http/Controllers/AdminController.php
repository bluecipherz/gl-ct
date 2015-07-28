<?php namespace App\Http\Controllers;

use DB;
use View;
use App\User;
use App\Category;
use App\Product;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 *	ADMIN ROUTE DEFINITIONS
	 */
	protected $pages = [
		'dashboard' => ['name' => 'Dashboard', 'partial' => 'dashboard'],
		'products' => ['name' => 'Products', 'partial' => 'products'],
		'categories' => ['name' => 'Categories', 'partial' => 'categories'],
		'ads' => ['name' => 'Ads', 'partial' => 'ads'],
		'orders' => ['name' => 'Orders', 'partial' => 'orders'],
		'transactions' => ['name' => 'Transactions', 'partial' => 'transactions'],
		'customers' => ['name' => 'Customers', 'partial' => 'customers'],
		'price-rules' => ['name' => 'Price Rules', 'partial' => 'price_rules'],
		'shipping' => ['name' => 'Shipping', 'partial' => 'shipping'],
		'preferences' => ['name' => 'Preferences', 'partial' => 'preferences'],
		'administration' => ['name' => 'Administration', 'partial' => 'administration'],
		'statistics' => ['name' => 'Statistics', 'partial' => 'statistics'],
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
		// check if page exists in $pages array
		if(array_key_exists($page, $this->pages)) {
			/**
			 * ADMIN ROUTES
			 */
            if ($page == 'price-rules') {
                $price_rules = DB::table('pricing_rules')->get();
                return view('admin.main')
                    ->with('currentPage', $page)
                    ->with('price_rules', $price_rules);
            } else if ($page == 'customers') {
                $users = User::all();
                return view('admin.main')
                    ->with('currentPage', $page)
                    ->with('customers', $users);
            } else if ($page == 'orders') {
                $orders = Order::all();
                return view('admin.main')
                    ->with('currentPage', $page)
                    ->with('orders', $orders);
            } else if ($page == 'ads') {
                $products = Product::all()->where('reseller', 1);
                return view('admin.main')
                    ->with('currentPage', $page)
                    ->with('products', $products);
            } else if($page == 'products') {
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
