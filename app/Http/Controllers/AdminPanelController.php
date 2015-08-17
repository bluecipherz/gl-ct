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
use App\Globex;
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
        return view('admin.main');
    }

    public function products(ProductRepository $products, CategoryRepository $categories)
    {
        // array_flip() = exchange keys and values in an array
        return view('admin.main')
            ->with('products', Globex::paginate())
            ->with('cats', Category::whereDepth(2)->lists('name', 'id'));
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
            // array_keys() = get keys from value
            // appends() = add 'get' variables (to url)
            $cats = Category::whereDepth(array_keys($types, $type))->paginate(25)->appends(Input::except('page'));
        } else if($view == 'all') {
            $cats = Category::paginate(25)->appends(Input::except('page'));
        }

        return view('admin.main')
            ->with('category', $_category) // needed for 'hierarchy' view
            ->with('cats', $cats) // needed for all views
            ->with('levels', $levels) // needed for all views
            ->with('view', $view) // needed for all views
            ->with('views', $views) // no need
            ->with('types', $types); // only for 'type' view
    }

    public function advertisements(AdvertisementRepository $advertisements)
    {
        return view('admin.main')
            ->with('advertisements', Advertisement::with('product', 'advertisable')->paginate());
    }
    public function homePage(ProductRepository $products, CategoryRepository $categories)
    {
        return view('admin.main')
            ->with('products', $products->paginate())
            ->with('cats', $categories->all(['name']));
    }

    public function orders(OrderRepository $orders, OrderItemRepository $orderItems)
    {
        return view('admin.main')
            ->with('orders', $orders->all());
    }

    public function transactions(TransactionRepository $transactions)
    {
        return view('admin.main')
            ->with('transactions', $transactions->all());
    }

    public function customers(CustomerRepository $customers)
    {
        return view('admin.main')
            ->with('customers', $customers->all());
    }

    public function priceRules(PriceRuleRepository $priceRules)
    {
        return view('admin.main')
            ->with('price_rules', $priceRules->all());
    }

    public function shipping(ShipperRepository $shippers, ShipmentRepository $shipments)
    {
        return view('admin.main')
            ->with('shipments', $shipments->all())
            ->with('shippers', $shippers->all());
    }

    public function administration(AdminRepository $admins)
    {
        return view('admin.main')
            ->with('admins', $admins->all())
            ->with('roles', Role::all());
    }

    public function messages()
    {
        return view('admin.main')->with('messages', Message::all());
    }

    public function reports()
    {
        return view('admin.main')->with('reports', Report::all());
    }

}
