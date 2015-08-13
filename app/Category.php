<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Baum\Node;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Node {

    use SoftDeletes;

	protected $table = 'categories';

    protected $guarded = ['id'];

    public function treeProducts() {
        // Get ids of descendants
        $categories = $this->descendants()->lists('id');

        // Include the id of category itself
        // $categories[] = $categories->getKey();

        // Get Products
        return Product::whereIn('category_id', $categories)->get();
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
	
}
