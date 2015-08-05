<?php namespace App\Services;

use App\Customer;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class CustomerRegistrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:customers',
			'password' => 'required|confirmed|min:6',
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
		return Customer::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
