<?php namespace App;
/**
 * Created by PhpStorm.
 * User: RAMU
 * Date: 15-08-2015
 * Time: 12:50
 */

use Illuminate\Database\Eloquent\Model;

class Motor extends Model {

    protected $table = "products_motors";

    protected $guarded = ["id"];

    public function advertisments()
    {
        return $this->morphedByMany('App\Advertisement', 'advertisable');
    }

    public function globexs()
    {
        return $this->morphedByMany('App\Globex', 'globexable');
    }


}