<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model {

    protected $table = 'post_sub_cats';

    public function products()
    {
        return $this->hasMany('App\Product', 'post_sub_cat_id');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }

}
