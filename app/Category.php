<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model {

	protected $table = 'categories';

    protected $guarded = ['id'];

    protected $softDelete = true;

    public function products() {
        $posts = $this->postSubCategories()->with('products');
        $products = [];
        $i = 0;
        foreach($posts as $post) {
            $product[$i] = $post->product();
            $i++;
        }
        return $products;
    }

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    public function postSubCategories()
    {
        return $this->hasManyThrough('App\PostSubCategory', 'App\SubCategory');
    }

}
