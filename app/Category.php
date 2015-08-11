<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Kalnoy\Nestedset\Node;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Node {

    use SoftDeletes;

	protected $table = 'categories';

    protected $guarded = ['id'];

    public function products() {
        // Get ids of descendants
        $categories = $this->descendants()->lists('id');

        // Include the id of category itself
        $categories[] = $categories->getKey();

        // Get Products
        return Product::whereIn('category_id', $categories)->get();
    }

    public function endNodes()
    {
        $endnodes = [];
        $nodes = $this->descendants()->get();
        foreach($nodes as $node) {

        }
//        return $nodes;
        return $endnodes;
    }

}
