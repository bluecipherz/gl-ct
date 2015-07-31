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
        return view('admin.dashboard')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name']);
    }

    public function products()
    {
        $products = Product::all();
        $cats = Category::all()->lists('name');
        $subcats = SubCategory::all()->lists('name');
        $postsubcats = PostSubCategory::all()->lists('name');
        return view('admin.products')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
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
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('cats', $cats)
            ->with('subcats', $subcats)
            ->with('postsubcats', $postsubcats);
    }

    public function advertisements()
    {
        $advertisments = Advertisement::all();

        return view('admin.advertisements')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('advertisements', $advertisments);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('orders', $orders);
    }

    public function transactions()
    {
        $transactions = Transaction::all();
        return view('admin.transactions')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('transactions', $transactions);
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('customers', $customers);
    }

    public function priceRules()
    {
        $priceRules = PriceRule::all();
        return view('admin.price_rules')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('price_rules', $priceRules);
    }

    public function shipping()
    {
        $shipments = Shipment::all();
        $shippers = Shipper::all();
        return view('admin.shipping')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('shipments', $shipments)
            ->with('shippers', $shippers);
    }

    public function preferences()
    {
        return view('admin.statistics')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name']);
    }

    public function administration()
    {
        $admins = Admin::all();
        return view('admin.administration')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name'])
            ->with('admins', $admins);
    }

    public function statistics()
    {
        return view('admin.statistics')
            ->with('pageTitle', $this->adminPanel->getPages()[__FUNCTION__]['name']);
    }

}
