<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;
    
    protected $table = "products";

	protected $guarded = ["id"];


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
