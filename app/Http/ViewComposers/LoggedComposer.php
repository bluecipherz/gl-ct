<?php
/**
 * Created by PhpStorm.
 * User: BCz Workstation #01
 * Date: 8/20/2015
 * Time: 5:59 AM
 */

namespace App\Http\ViewComposers;


use Auth;
use Illuminate\View\View;

class LoggedComposer {

    public function compose(View $view)
    {
        $view->with('customer', Auth::customer()->get());
    }

}