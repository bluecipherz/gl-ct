<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Emirate extends Model {

    protected $table = 'emirates';

    public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }

}
