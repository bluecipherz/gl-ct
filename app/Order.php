<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

    use SoftDeletes;

    protected $table = "orders";

    protected $guarded = ["id"];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_item');
    }

    /**
     * @return mixed
     */
//    public function total()
//    {
//        return $this->orderItems->sum('price');
//    }

}
