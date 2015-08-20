<?php namespace App\Http\Controllers;

use App\Advertisement;
use App\Message;
use App\Motor;
use App\Globex;
use App\Product;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Category;
use Cache;
use Illuminate\Support\Facades\Validator;
use Input;
use DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

    public function contactUs(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'subject' => 'required',
            'contact' => 'required',
            'message' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->messages());
        }
        Message::create(array_except($request->all(), ['_token']));
        return redirect('/contact-us')->withMessage('Message Sent.');
    }

}
