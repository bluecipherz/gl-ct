<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 04-Aug-15
 * Time: 9:53 AM
 */

namespace App\Http\ViewComposers;

use App\HomeGrid;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;
use App\Repositories\HomeRepository;

class HomeComposer {

    protected $home;

    public function __construct(HomeRepository $home) {
        $this->home = $home;
    }

    public function compose(View $view)
    {
        $view->with('catset', $this->home->getCatSet());
        $view->with('homegrids', HomeGrid::all());
        $view->with('subcats', $this->home->getSubCatSet());
    }

}