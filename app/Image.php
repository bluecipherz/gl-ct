<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model {

	use SoftDeletes;
	
    protected $table = 'images';

    protected $guarded = ['id'];

//    public function imageable()
//    {
//		return $this->morphTo();
//    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
