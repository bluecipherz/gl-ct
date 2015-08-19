<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 16-Aug-15
 * Time: 5:34 AM
 */

namespace App\Http\ViewComposers;

use App\Product;
use Illuminate\View\View;
use App\Globex;
use App\Advertisement;
use App\Motor;
use DB;

class CoreComposer {

    protected $products;

    public function __construct()
    {
//        $productQuery = Globex::with('images')->select('id', 'title', 'description', 'price', DB::raw('0 as type'));
//        $adQuery = Advertisement::with('images')->select('id', 'title', 'description','price', DB::raw('1 as type'));
//        $motorQuery = Motor::with('images')->select('id', 'title', 'description','price', DB::raw('2 as type'));
//        $this->products = $adQuery->get()->merge($productQuery->get())->merge($motorQuery->get());
        $this->products = Product::with('producible')->get();
    }

    public function compose(View $view)
    {
        $view->with('products', $this->products);
    }

}