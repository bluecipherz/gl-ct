<?php namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Category;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\PostSubCategory;
use App\PriceRule;
use App\Product;
use App\Repositories\AdminPanelRepository;
use App\Repositories\AdminRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Shipment;
use App\Shipper;
use App\SubCategory;
use App\Transaction;
use Illuminate\Http\Request;

class AdminPanelController extends Controller {


    protected $adminPanel;

    public function __construct(AdminPanelRepository $adminpanel)
    {
        $this->adminPanel = $adminpanel;
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products(ProductRepository $product, CategoryRepository $category)
    {
        $products = $product->paginate();
        $cats = Category::all()->lists('name');
        $subcats = SubCategory::all()->lists('name');
        $postsubcats = PostSubCategory::all()->lists('name');
        return view('admin.products')
            ->with('products', $products)
            ->with('cats', $cats)
            ->with('subcats', $subcats)
            ->with('postsubcats', $postsubcats);
    }

    public function categories()
    {
        $cats = Category::all()->lists('name');
        $subcats = SubCategory::all()->lists('name');
        $postsubcats = PostSubCategory::all()->lists('name');
        return view('admin.categories')
            ->with('cats', $cats)
            ->with('subcats', $subcats)
            ->with('postsubcats', $postsubcats);
    }

    public function advertisements()
    {
        $advertisments = Advertisement::all();

        return view('admin.advertisements')
            ->with('advertisements', $advertisments);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders')
            ->with('orders', $orders);
    }

    public function transactions()
    {
        $transactions = Transaction::all();
        return view('admin.transactions')
            ->with('transactions', $transactions);
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers')
            ->with('customers', $customers);
    }

    public function priceRules()
    {
        $priceRules = PriceRule::all();
        return view('admin.price_rules')
            ->with('price_rules', $priceRules);
    }

    public function shipping()
    {
        $shipments = Shipment::all();
        $shippers = Shipper::all();
        return view('admin.shipping')
            ->with('shipments', $shipments)
            ->with('shippers', $shippers);
    }

    public function preferences()
    {
        return view('admin.statistics');
    }

    public function administration()
    {
        $admins = Admin::all();
        return view('admin.administration')
            ->with('admins', $admins);
    }

    public function statistics()
    {
        return view('admin.statistics');
    }

}
