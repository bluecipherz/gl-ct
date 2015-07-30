<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = "products";

	protected $guarded = ["id"];

    protected $softDelete = true;

    public function orders()
    {
        return $this->belongsToMany("Order", "order_item");
    }

    public function orderItems()
    {
        return $this->hasMany("OrderItem");
    }

    public function postSubCategory()
    {
        return $this->belongsTo('PostSubCategory');
    }

    public function subCategory()
    {

    }

    public function category()
    {

    }

}
