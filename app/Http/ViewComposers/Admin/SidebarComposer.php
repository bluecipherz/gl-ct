<?php namespace app\Http\ViewComposers\Admin;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 9:49 PM
 */

use App\Repositories\AdminPanelRepository;
use Illuminate\Contracts\View\View;

class SidebarComposer {


    protected $navs;

    /**
     * Create a new composer
     *
     */
    public function __construct(AdminPanelRepository $admin) {
        // Dependencies automatically resolved by service container.
        $this->navs = $admin->getPages();
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('pages', $this->navs);
        $view->items->put('dashboard', [
            'weight' => 0,
            'request' => '*/$view->prefix',
            'route' => 'dashboard.index',
            'icon-class' => 'fa fa-dashboard',
            'title' => 'Dashboard',
        ]);
    }
}