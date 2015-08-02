<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected $table = 'order_items';

	protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

}
