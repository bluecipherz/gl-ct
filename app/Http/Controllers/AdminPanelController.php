<?php namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Category;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\PriceRule;
use App\Product;
use App\Repositories\AdminPanelRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Shipment;
use App\Shipper;
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

    public function products(ProductRepository $products, CategoryRepository $categories)
    {
        return view('admin.products')
            ->with('products', $products->paginate())
            ->with('cats', $categories->all(['name']));
    }

    public function categories(CategoryRepository $categories)
    {
        return view('admin.categories')
            ->with('cats', $categories->all(['name']));
    }

    public function advertisements(AdvertisementRepository $advertisements)
    {
        return view('admin.advertisements')
            ->with('advertisements', $advertisements->all());
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
