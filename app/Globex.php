<?php namespace App;


class Globex extends Product {

    protected $table = "products_globex";

//    public function images()
//    {
//        return $this->morphMany('App\Image', 'imageable');
//    }

    public function orders()
    {
        return $this->belongsToMany("Order", "order_item");
    }

    public function orderItems()
    {
        return $this->hasMany("OrderItem");
    }

    public function priceRule()
    {
        return $this->hasOne('App\PriceRule');
    }

    public function product()
    {
        return $this->morphOne('App\Product', 'producible');
    }

    public function globexable()
    {
        return $this->morphTo();
    }

}
