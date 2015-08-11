<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $table = 'customers';

    protected $hidden = ['password', 'remember_token'];

    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }

}
