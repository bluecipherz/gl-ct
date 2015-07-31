<?php namespace app\Http\ViewCreators;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 3:11 AM
 */

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class SidebarViewCreator {

    public function create($view)
    {
        $view->prefix = Config::get('core::core.admin-prefix');
        $view->items = new Collection;
    }

}