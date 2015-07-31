<?php namespace app\Http\ViewComposers;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 6:16 PM
 */

use Illuminate\Contracts\View\View;

class CartComposer {

    /**
     * Cart manager instance.
     *
     * @var
     */
    protected $cart;

    /**
     * Create a new CartComposer instance
     */
    public function __construct()
    {
        $this->cart = app()->make('cart.store');
    }

    /**
     * Compose the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('cart', $this->cart);
    }

}