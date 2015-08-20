<?php namespace App;

use Illuminate\Database\Eloquent\Collection;
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
        $categories = $this->leaves()->lists('id');

        // Include the id of category itself
        // $categories[] = $categories->getKey();

        // Get Products
        return Product::whereIn('category_id', $categories)->get();
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function childProducts()
    {
//        $products = new Collection;
        $cats = [];
        if ($this->depth == 0) {
            foreach ($this->children()->get() as $subcat) {
                foreach ($subcat->children()->get() as $postcat) {
//                    $products->add($postcat->products);
                    $cats = array_merge($cats, $postcat->products->lists('id'));
                }
            }
        } else if($this->depth == 1) {
            foreach ($this->children()->get() as $postcat) {
//                $products->add($postcat->products);
                $cats = array_merge($cats, $postcat->products->lists('id'));
            }
        } else if ($this->depth == 2) {
            return $this->products->lists('id');
        }
        return $cats;
//        return $products;
    }
	
}
