<?php namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Category;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
use App\Report;
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
use Input;

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

    public function categories()
    {
        $view = Input::get('view');
        if ($view == null) {
            return redirect('/admin/categories?view=hierarchy');
        }
        $levels = ['Main Category', 'Subcategory', 'Post Sub Category'];
        $types = ['main-categories', 'sub-categories', 'post-sub-categories'];
        $views = ['Hierarchy', 'Type', 'All'];
        $cats = Category::roots()->get();
        $category = Input::get('category');
        $_category = Category::find($category);
        if($view == 'type') {
            $type = Input::get('type');
            if($type == null) $type = $types[0];
            $cats = Category::whereDepth(array_keys($types, $type))->paginate(25)->appends(Input::except('page'));
        } else if($view == 'all') {
            $cats = Category::paginate(25)->appends(Input::except('page'));
        }

        return view('admin.categories')
            ->with('category', $_category) // needed for 'hierarchy' view
            ->with('cats', $cats) // needed for all views
            ->with('levels', $levels) // needed for all views
            ->with('view', $view) // needed for all views
            ->with('views', $views) // no need
            ->with('types', $types); // only for 'type' view
    }

    public function advertisements(AdvertisementRepository $advertisements)
    {
        return view('admin.advertisements')
            ->with('advertisements', $advertisements->all());
    }
    public function homePage(ProductRepository $products, CategoryRepository $categories)
    {
        return view('admin.homepage')
            ->with('products', $products->paginate())
            ->with('cats', $categories->all(['name']));
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
        return view('admin.messages')->with('messages', Message::all());
    }

    public function reports()
    {
        return view('admin.reports')->with('reports', Report::all());
    }

}
