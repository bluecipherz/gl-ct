<?php namespace App\Http\ViewComposers;

use App\Repositories\AdminPanelRepository;
use Illuminate\Contracts\View\View;

/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 11:29 PM
 */


class AdminPanelComposer {

    protected $adminPanel;

    public function __construct(AdminPanelRepository $adminPanel)
    {
        $this->adminPanel = $adminPanel;
    }

    public function compose(View $view)
    {
        $view->with('pages', $this->adminPanel->getPages());
    }

}