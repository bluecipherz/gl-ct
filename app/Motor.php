<?php namespace App;
/**
 * Created by PhpStorm.
 * User: RAMU
 * Date: 15-08-2015
 * Time: 12:50
 */



class Motor extends Product {

    protected $table = "motors";

    protected $guarded = ["id"];

    public function images()
    {
        return $this->hasMany('App\ProductImage', 'product_id');
    }

}