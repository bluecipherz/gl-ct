<?php namespace App\Http\Controllers;

use App\Customer;
use App\Services\AdminRegistrar;
use App\Services\CustomerRegistrar;
use App\Services\Registrar;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
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
            'password' => $request->get('password'),
        ]);

        Auth::customer()->login($user);

        if ($request->ajax()) {
            return view('auth.partials.logged');
        } else {
            return redirect('/')->withMessage('Account Created');
        }
    }

    public function registerAdmin(Request $request) {
        $validator =  $this->admin->validator($request->all());
        if($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $admin = $this->admin->create([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ]);
        Auth::admin()->login($admin);

        if ($request->ajax()) {
            return response()->json([
                'result' => 'success',
                'message' => 'Registered'
            ]);
        } else {
            return redirect()->back()->withMessage('Account Created');
        }
    }

	public function loginCustomer(Request $request) {
		$credentials = [
			'email' => $request->get('email'),
			'password' => $request->get('password'),
//            'active' => 1
		];
        if (Auth::customer()->attempt($credentials)) {
           // echo 'Logging in ' . $credentials['email'] . '<br>';
            if($request->ajax()) {
                return view('auth.partials.logged');
            } else {
                return redirect()->intended('/home');
            }
        } else {
             $this->throwLoginException($request);
//			return response()->json('fail', 400);
        }
	}

    public function loginAdmin(Request $request) {
        $credentials = [
            'username' => $request->get('username'),
//            'email' => $request->get('email'),
            'password' => $request->get('password'),
//            'active' => true
        ];
        if(Auth::admin()->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        } else {
            $this->throwLoginException($request);
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
