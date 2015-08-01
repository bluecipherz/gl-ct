<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 31-Jul-15
 * Time: 9:42 PM
 */

namespace App\Http;


class SidebarCreator {

    public function create($view)
    {
        $view->item = new Collection;
        $view->prefix = Config::get('core.admin-prefix');
    }

}