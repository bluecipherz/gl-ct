<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipper extends Model {

    use SoftDeletes;

    protected $table = 'shippers';

    protected $guarded = ['id'];

}
