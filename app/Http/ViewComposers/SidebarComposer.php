<?php namespace app\Http\ViewComposers;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 9:49 PM
 */

use App\Repositories\AdminPanelRepository;
use Illuminate\Contracts\View\View;

class SidebarComposer {


    protected $pages;

    /**
     * Create a new composer
     * @param AdminPanelRepository $admin
     */
    public function __construct(AdminPanelRepository $admin) {
        // Dependencies automatically resolved by service container.
        $this->pages = $admin->getPages();
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('pages', $this->pages);
//        $view->pages->put('dashboard', [
//            'weight' => 0,
//            'request' => '*/$view->prefix',
//            'route' => 'admin',
//            'icon-class' => 'fa fa-dashboard',
//            'title' => 'Dashboard',
//        ]);
    }
}