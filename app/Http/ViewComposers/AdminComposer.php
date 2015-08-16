<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 16-Aug-15
 * Time: 6:16 AM
 */

namespace App\Http\ViewComposers;

use App\Repositories\AdminPanelRepository;
use Request;
use Illuminate\View\View;

class AdminComposer {

    protected $repository;

    public function __construct(AdminPanelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function compose(View $view)
    {
        $showPage = array_search(Request::path(), array_column($this->repository->getPages(), 'request', 'map'));
        $view->with('showPage', $showPage);
    }

}