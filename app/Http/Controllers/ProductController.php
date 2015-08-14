<?php namespace App\Http\Controllers;

use App\Category;
use App\Repositories\CategoryRepository;
use DB;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use File;
use Input;

class ProductController extends Controller {

	public function all(Request $request)
	{
        if ($request->ajax()) {
            return response()->json(Product::all()->lists('name'));
        } else {
            abort(404);
        }
	}

	public function search(Request $request, CategoryRepository $categoryRepository)
	{
		$q = $request->get('q');
		if($q) {
			$searchTerms = explode(' ', $q);
			$query = DB::table('products');
			foreach($searchTerms as $term)
			{
				$query->where('title', 'LIKE', '%' . $term . '%');
			}
			$results = $query->get();
			return view('pages.search', ['products' => $results, 'categories' => $categoryRepository->getCats()]);
		} else {
			$products = Product::all();
			return view('pages.search',  ['products' => $products, 'categories' => $categoryRepository->getCats()]);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $product = Product::create($request->except(['_token', 'images']));
        $file = Input::file('images');
//        $files = Input::file('images');
        $dir = public_path() . '/uploads/products/' . $product->id . '/';
        if(!File::exists($dir)) {
            mkdir($dir, 0777, true);
        }
//        foreach ($files as $file) {
            $filename = sha1($file->getClientOriginalName() . time());
            $extension = $file->getClientOriginalExtension();
            echo $filename . '<br>';
            $product->images()->create([
                'product_id' => $product->id,
                'url' => url('/uploads/products/' . $product->id . '/' . $filename . '.' . $extension)
            ]);
            $file->move($dir, $filename . '.' . $extension);
//        }
        echo 'ok' ;
//		return redirect()->back()->with('message', 'Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
