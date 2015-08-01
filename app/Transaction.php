<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model {

    use SoftDeletes;

    protected $table = 'transactions';

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
