<?php namespace App;

class Advertisement extends Product {

    protected $table = 'products_ads';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

//    public function images()
//    {
//        return $this->morphMany('App\Image', 'imageable');
//    }

    public function product()
    {
        return $this->morphOne('App\Product', 'producible');
    }

    public function advertisable()
    {
        return $this->morphTo();
    }

}
