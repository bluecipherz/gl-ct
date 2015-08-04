<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Cache;
use Illuminate\Support\Facades\Validator;

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
//        $catset = $this->getCatSet();
//        foreach ($catset as $cat) {
//            echo $cat['title'] . '<br>';
//            foreach ($cat['children'] as $col) {
//                foreach($col as $item){
//                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $item['title'] . '<br>';
//                }
//                echo '<br>';
//            }
//        }
	}

    public function contactUs(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'subject' => 'required|min:10',
            'contact' => 'required',
            'description' => 'required|min:50'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
//            echo $validator->messages();
            return redirect()->back()->with('errors', $validator->messages());
        }
    }

    public function reportImage(Request $request)
    {

    }

}
