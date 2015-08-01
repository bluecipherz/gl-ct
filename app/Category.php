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

    }

}
