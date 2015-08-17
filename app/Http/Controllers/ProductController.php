<?php namespace App\Http\Controllers;

use App\Category;
use App\Motor;
use App\Product;
use App\Repositories\CategoryRepository;
use App\Globex;
use App\Http\Requests;

use Illuminate\Http\Request;
use File;
use Input;
use DB;

class ProductController extends Controller {

	public function all(Request $request)
	{
        if ($request->ajax()) {
            return response()->json(Globex::all()->lists('name'));
        } else {
            return response('Not found', 404);
        }
	}

	public function search(Request $request, CategoryRepository $categoryRepository)
	{
		$q = $request->get('q');
		if($q) {
			$searchTerms = explode(' ', $q);
			$query = Product::with('producible');
			foreach($searchTerms as $term)
			{
				$query->where('title', 'LIKE', '%' . $term . '%');
			}
			$results = $query->get();
			return view('pages.search', ['products' => $results, 'categories' => $categoryRepository->getCats()]);
		} else {
			$products = Globex::all();
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
//        return response()->json($request->all());
        $category = Category::find($request->get('category_id'));
        if ($category->isDescendantOf(Category::find(1))) { // motors
            $motor = Motor::create($request->only('chassis_no', 'model', 'color', 'doors'));
            $globex = Globex::create($request->only('stock'));
            $motor->globexs()->save($globex);
        } else {
            $globex = Globex::create($request->only('stock'));
        }
        $product = Product::create($request->only(['title', 'description', 'brand', 'category_id', 'price']));
        $globex->product()->save($product);
//        $file = Input::file('images');
        $files = Input::file('images');
        $dir = public_path() . '/uploads/products/' . $globex->id . '/';
        if(!File::exists($dir)) {
            mkdir($dir, 0777, true);
        }
        foreach ($files as $file) {
            if($file != null) {
                $filename = sha1($file->getClientOriginalName() . time());
                $extension = $file->getClientOriginalExtension();
//            echo $filename . '<br>';
//            $image = Image::create([
//                'imageable_id' => $globex->id,
//                'imageable_type' => get_class($globex),
//                'url' => url('/uploads/globex/' . $globex->id . '/' . $filename . '.' . $extension)
//            ]);
//            $globex->images()->save($image);
                $imgdata = [
                    'product_id' => $product->id,
                    'url' => url('/uploads/products/' . $globex->id . '/' . $filename . '.' . $extension)
                ];
                $product->images()->create($imgdata);
                $file->move($dir, $filename . '.' . $extension);
            }
        }
//        echo 'ok' ;
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
		$product = Product::find($id);
        return view('pages.product.show',compact('product'));
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
