<?php namespace App\Http\Controllers;

use App\Message;
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
//            echo $validator->messages();
            return redirect()->back()->with('errors', $validator->messages());
        }
        $message = Message::create(array_except($request->all(), ['_token']));
//        print_r($message);
        return redirect('/contact-us')->withMessage('Message Sent.');
    }

    public function search()
    {
        $q = Input::get('q');
        if ($q) {
            $searchTerms = explode(' ', $q);
            $productQuery = DB::table('products')->select('id', 'title', 'description');
            $adQuery = DB::table('advertisements')->select('id', 'title', 'description');
            foreach ($searchTerms as $term) {
                $productQuery->where('title', 'LIKE', '%' . $term . '%')->union($adQuery);
            }
            $results = $productQuery->get();
            return response()->json($results);
        }
    }

}
