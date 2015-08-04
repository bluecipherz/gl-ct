<?php namespace App\Http\Controllers;

use App\Customer;
use Ollieread\Multiauth\Guard;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\LoginException;

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

    protected $guard;

    public function __construct(Guard $guard) {
		$this->guard = $guard;
    }
	
	public function registerUser(Request $request) {
		$validator =  Validator::make($request->all(), $this->user_register_rules);
		if($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		
		$user = Customer::create([
			'email' => $request->get('email'),
			'password' => bcrypt($request->get('password')),
		]);
		
		$this->guard->login($user);
		
		return view('auth.partials.logged');
	}

	public function loginUser(Request $request) {
		$credentials = [
			'email' => $request->get('email'),
			'password' => $request->get('password'),
            'active' => true
		];
		if($this->guard->attempt($credentials)) {
			// return redirect()->intended('/home');
			return view('auth.partials.logged');
		} else {
            throw new LoginException(response('Login incorrect', 422));
        }
	}

    public function loginAdmin(Request $request) {

    }
	
	public function logoutUser() {
		$this->guard->logout();
		return redirect()->intended('/home');
	}

}
