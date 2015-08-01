<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

    use SoftDeletes;

    protected $table = "orders";

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function orderItems()
    {
        return $this->hasMany("OrderItem");
    }

    public function products()
    {
        return $this->belongsToMany("Product", "order_item");
    }

    /**
     * @return mixed
     */
    public function total()
    {
        return $this->orderItems->sum('price');
    }

}
