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

    public function category()
    {

    }

    public function priceRule()
    {
        return $this->hasOne('App\PriceRule');
    }

}
