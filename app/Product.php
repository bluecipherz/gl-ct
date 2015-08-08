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
		return $this->belongsTo('App\Category');
    }
	
	public function images()
	{
		return $this->hasMany('App\ProductImage');
	}

    public function priceRule()
    {
        return $this->hasOne('App\PriceRule');
    }

}
