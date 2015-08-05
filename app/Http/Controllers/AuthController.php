<?php namespace App\Http\Controllers;

use App\Customer;
use App\Services\AdminRegistrar;
use App\Services\CustomerRegistrar;
use App\Services\Registrar;
use Validator;
use App\Http\Requests;
use Auth;
use App\Exceptions\LoginException;
use Illuminate\Http\Request;

class AuthController extends Controller {

	protected $login_rules = [
		'email' => 'required|email',
		'password' => 'required'
	];

    protected $admin;

    protected $customer;

    public function __construct(AdminRegistrar $admin, CustomerRegistrar $customer) {
        $this->admin = $admin;
        $this->customer = $customer;
    }
	
	public function registerCustomer(Request $request) {
		$validator =  $this->customer->validator($request->all());
		if($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

        $user = $this->customer->create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
		
		Auth::customer()->login($user);

        if ($request->ajax()) {
            return view('auth.partials.logged');
        } else {
            return redirect()->back()->withMessage('Account Created');
        }
	}

	public function loginCustomer(Request $request) {
		$credentials = [
			'email' => $request->get('email'),
			'password' => $request->get('password'),
            'active' => true
		];
		if(Auth::customer()->attempt($credentials)) {
			// return redirect()->intended('/home');
			return view('auth.partials.logged');
		} else {
            throw new LoginException($request);
        }
	}

    public function loginAdmin(Request $request) {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'active' => true
        ];
        if(Auth::admin()->attempt($credentials)) {
            return response('/admin/dashboard');
        } else {
            throw new LoginException($request);
        }
    }
	
	public function logoutCustomer() {
        Auth::customer()->logout();
		return redirect()->intended('/home');
	}

    public function logoutAdmin()
    {
        Auth::admin()->logout();
        return redirect()->intended('/home');
    }

}
