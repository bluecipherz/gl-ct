<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 01-Aug-15
 * Time: 5:34 AM
 */

namespace App\Http\ViewComposers;

use App\Repositories\AdminPanelRepository;
use Illuminate\Contracts\View\View;
use Request;

class AdminPanelComposer {

    protected $pages;

    public function __construct(AdminPanelRepository $admin)
    {
        $this->pages = $admin->getPages();
    }

    public function compose(View $view)
    {
        $title = array_search(Request::path(), array_column($this->pages, 'request', 'title'));
        $view->with('pageTitle', $title);
    }

}