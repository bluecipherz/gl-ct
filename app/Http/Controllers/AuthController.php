<?php namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller {

	protected $user_register_rules = [
		'email' => 'required|email|max:255|unique:users',
		'password' => 'required|confirmed|min:6'
	];
	
	protected $admin_register_rules = [
		'email' => 'required|email|max:255|unique:admins',
		'password' => 'required|confirmed|min:8'
	];
	
	protected $login_rules = [
		'email' => 'required|email',
		'password' => 'required'
	];

	public function registerUser(Request $request) {
		$validator =  Validator::make($request->all(), $this->user_register_rules);
		if($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		
		$user = User::create([
			'email' => $request->get('email'),
			'password' => bcrypt($request->get('password')),
		]);
		
		Auth::login($user);
		
		return view('auth.partials.logged');
	}

	public function loginUser(Request $request) {
		$credentials = [
			'email' => $request->get('email'),
			'password' => $request->get('password')
		];
		if(Auth::attempt($credentials)) {
			// return redirect()->intended('/home');
			return view('auth.partials.logged');
		}
	}
	
	public function logoutUser() {
		Auth::logout();
		return redirect()->intended('/home');
	}

}
