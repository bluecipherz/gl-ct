<?php namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Category;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\Order;
use App\OrderItem;
use App\PriceRule;
use App\Product;
use App\Repositories\AdminPanelRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PriceRuleRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ShipmentRepository;
use App\Repositories\ShipperRepository;
use App\Repositories\TransactionRepository;
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

    public function orders(OrderRepository $orders, OrderItemRepository $orderItems)
    {
        return view('admin.orders')
            ->with('orders', $orders->all());
    }

    public function transactions(TransactionRepository $transactions)
    {
        return view('admin.transactions')
            ->with('transactions', $transactions->all());
    }

    public function customers(CustomerRepository $customers)
    {
        return view('admin.customers')
            ->with('customers', $customers->all());
    }

    public function priceRules(PriceRuleRepository $priceRules)
    {
        return view('admin.price_rules')
            ->with('price_rules', $priceRules->all());
    }

    public function shipping(ShipperRepository $shippers, ShipmentRepository $shipments)
    {
        return view('admin.shipping')
            ->with('shipments', $shipments->all())
            ->with('shippers', $shippers->all());
    }

    public function preferences()
    {
        return view('admin.statistics');
    }

    public function administration(AdminRepository $admins)
    {
        return view('admin.administration')
            ->with('admins', $admins->all())
            ->with('roles', Role::all());
    }

    public function statistics()
    {
        return view('admin.statistics');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function reports()
    {
        return view('admin.reports');
    }

}
