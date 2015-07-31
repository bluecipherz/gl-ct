<?php namespace App\Http\ViewComposers;

use App\Repositories\AdminRepository;
use Illuminate\Contracts\View\View;
use Auth;

class AdminComposer {

    /**
     * @var AdminRepository
     */
    protected $admin;

    protected $navs;

	/**
	 * Create a new admin composer
	 *
	 * @return void
	 */
	public function __construct(AdminPanelRepository $adminpanel) {
		// Dependencies automatically resolved by service container.
		$this->admin = $admin;
        $this->navs = [
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
	}

    /**
	 * Bind data to the view
	 *
	 * @param View $view
	 * @return
	 */
	public function compose(View $view)
	{
//        $admin = Auth::user();
//        $view->with('cribbs', $this->admin->cribbbs($admin->id));
//        $view->with('cribbs', 'asd');
//        $this->admin->cribbbs(1);
        $view->with('pages', $this->navs);
            ->with('currentPage', $this->admin[])
	}

}