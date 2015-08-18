<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeGrid extends Model {

    protected $table = "homegrids";

    protected $guarded = ["id"];

    public function slots()
    {
        return $this->hasMany('App\GridSlot', 'homegrid_id');
    }

}
