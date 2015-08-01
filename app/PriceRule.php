<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceRule extends Model {

    use SoftDeletes;
    
	protected $table = 'price_rules';

    protected $guarded = ['id'];

}
