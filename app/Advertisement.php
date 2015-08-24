<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model {

    protected $table = 'products_ads';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function emirate()
    {
        return $this->belongsTo('App\Emirate');
    }

    public function product()
    {
        return $this->morphOne('App\Product', 'producible');
    }

    public function advertisable()
    {
        return $this->morphTo();
    }

}
