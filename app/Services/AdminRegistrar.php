<?php
/**
 * Created by PhpStorm.
 * User: RAMU
 * Date: 04-08-2015
 * Time: 17:40
 */

namespace App\Services;

use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Validator;
use App\Admin;

class AdminRegistrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:admins',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

}