<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model {

	use SoftDeletes;
	
    protected $table = 'reseller_images';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function advertisement()
    {
		return $this->belongsTo('App\Advertisement');
    }


}
