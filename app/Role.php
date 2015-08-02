<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {

    use SoftDeletes;

    protected $table = 'roles';

    protected $guarded = ['id'];

    public function admins()
    {
        return $this->belongsToMany('App\Admin', 'admins_roles');
    }

}
