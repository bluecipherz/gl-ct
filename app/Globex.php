<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Globex extends Model {

    protected $table = "products_globex";

    protected $guarded = ['id'];

    public $timestamps = false;

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
