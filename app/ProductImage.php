<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model {

	use SoftDeletes;
	
    protected $table = 'product_images';

    protected $guarded = ['id'];

    public function product()
    {
		return $this->belongsTo('App\Product');
    }


}
