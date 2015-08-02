<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model {


    use SoftDeletes;
    
    protected $table = 'shipments';

    protected $guarded = ['id'];

    public function shipper()
    {
        return $this->belongsTo('App\Shipper');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function status()
    {
        if ($this->status == 1) {
            return 'In Transit';
        } else if($this->status == 2) {
            return 'Delivered';
        }
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 2);
    }

}
