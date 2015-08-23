<?php namespace App;
/**
 * Created by PhpStorm.
 * User: BCz Workstation #01
 * Date: 8/16/2015
 * Time: 12:15 PM
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function producible()
    {
        return $this->morphTo();
    }

    public function related()
    {
        return Product::whereCategoryId($this->category_id)->where('id', '!=', $this->id)->take(4);
    }

    public function scopeGlobexs($query)
    {
        return $query->where('producible_type', '=', 'App\Globex');
    }

    public function scopeAdvertisements($query, $asd)
    {
        return $query->where('producible_type', '=', 'App\Advertisement');
    }

}