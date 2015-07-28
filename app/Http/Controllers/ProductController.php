<?php namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller {


	public function createPostSubCat(Request $request)
	{
		DB::table('post_sub_cats')->insert(
			['name' => $request->get('name'), 'sub_category_id' => $request->get('sub_category')]
		);
		return redirect()->back();
	}

	public function createSubCat(Request $request)
	{
		DB::table('sub_categories')->insert(
			['name' => $request->get('name'), 'category_id' => $request->get('category')]
		);
		return redirect()->back();
	}

	public function createCat(Request $request)
	{
		DB::table('categories')->insert(
			['name' => $request->get('name')]
		);
		return redirect()->back();
	}

	public function postSubCats(Request $request)
	{
		$subcategory = $request->get('sub_category');
		$data = DB::table('post_sub_cats')->where('sub_category_id', $subcategory)->lists('name');
		array_unshift($data, null);
		unset($data[0]);
		return response()->json($data);
	}

	public function subCats(Request $request)
	{
		$category = $request->get('category');
		$data = DB::table('sub_categories')->where('category_id', $category)->lists('name');
		array_unshift($data, null);
		unset($data[0]);
		return response()->json($data);
	}

	public function allProducts()
	{
		return response()->json(Product::all()->lists('name'));
	}

	public function search(Request $request)
	{
		$q = $request->get('q');
		if($q) {
			$searchTerms = explode(' ', $q);
			$query = DB::table('products');
			foreach($searchTerms as $term)
			{
				$query->where('name', 'LIKE', '%' . $term . '%');
			}
			$results = $query->get();
			return view('pages.search', ['products' => $results]);
		} else {
			$products = Product::all();
			return view('pages.search', compact('products'));
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
