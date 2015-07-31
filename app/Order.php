<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

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

}
