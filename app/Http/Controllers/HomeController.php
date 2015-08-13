<?php namespace App\Http\Controllers;

use App\Advertisement;
use App\Message;
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
//            echo $validator->messages();
            return redirect()->back()->with('errors', $validator->messages());
        }
        $message = Message::create(array_except($request->all(), ['_token']));
//        print_r($message);
        return redirect('/contact-us')->withMessage('Message Sent.');
    }

    public function search(CategoryRepository $categories)
    {
        $q = Input::get('q');
        if ($q) {
            $searchTerms = explode(' ', $q);
            $productQuery = Product::with('images')->select('id', 'title', 'description', 'price', DB::raw('"product" as type'));
            $adQuery = Advertisement::with('images')->select('id', 'title', 'description','price', DB::raw('"reselle" as type'));
            foreach ($searchTerms as $term) {
                $adQuery->where('title', 'LIKE', '%' . $term . '%');
                $productQuery->where('title', 'LIKE', '%' . $term . '%');
            }
            $results = array_merge($productQuery->get()->toArray(), $adQuery->get()->toArray());
            return view('pages.search', ['products' => $results, 'categories' => $categories]);
        }
    }

    public function search_2(CategoryRepository $categories)
    {

        $q = Input::get('q');
        if ($q) {
            $searchTerms = explode(' ', $q);
            $productQuery = DB::table('products')->select('id', 'title', 'description','price', DB::raw('1 as type'));
            $adQuery = DB::table('advertisements')->select('id', 'title', 'description','price', DB::raw('0 as type'));
            foreach ($searchTerms as $term) {
                $adQuery->where('title', 'LIKE', '%' . $term . '%');
                $productQuery->where('title', 'LIKE', '%' . $term . '%');
            }
            $results = $productQuery->union($adQuery)->get();
            return view('pages.search', ['products' => $results , 'categories' => $categories->getCats()]);
        }
    }

}
