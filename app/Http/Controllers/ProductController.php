<?php namespace App\Http\Controllers;

use App\Category;
use App\Repositories\CategoryRepository;
use DB;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller {

	public function allProducts(Request $request)
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
		$values = array_except($request->all(), ['_token', 'category', 'sub_category', 'post_sub_cat']);
		// $values['category_id'] = $request->get('category');
		// $values['sub_category_id'] = $request->get('sub_category');
		$values['post_sub_cat_id'] = $request->get('post_sub_cat');
		$values['reseller'] = false;
		Product::create($values);
		return redirect()->back()->with('message', 'Created');
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
