<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GridSlot extends Model {

    protected $table = "gridslots";

    protected $guarded = ["id"];

    public function grid()
    {
        return $this->belongsTo('App\HomeGrid');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
