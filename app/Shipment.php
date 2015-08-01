<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model {


    use SoftDeletes;
    
    protected $table = 'shipments';

    protected $guarded = ['id'];

    public function scopeDelivered($query)
    {
        return $query->where('status', 2);
    }

}
