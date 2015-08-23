<?php namespace App\Http\Controllers;

use App\Category;
use App\Motor;
use App\Product;
use App\Repositories\CategoryRepository;
use App\Globex;
use App\Http\Requests;

use App\Repositories\Criteria\Product\CategoryCriteria;
use App\Repositories\Criteria\Product\PriceAboveCriteria;
use App\Repositories\Criteria\Product\PriceBelowCriteria;
use App\Repositories\Criteria\Product\SearchQueryCriteria;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use File;
use Input;
use DB;

class ProductController extends Controller {

    protected $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

	public function all(Request $request)
	{
        if ($request->ajax()) {
            return response()->json(Globex::all()->lists('name'));
        }
	}

	public function getSearch(CategoryRepository $repository)
	{
        $search = Input::get('q');
//        $search = 'as';
//        $cats = [1, 63];
        if($search) $this->repository->pushCriteria(new SearchQueryCriteria($search));
//        $this->repository->getByCriteria(new CategoryCriteria($cats));
//        $this->repository->pushCriteria(new PriceBelowCriteria(5000));
//        $this->repository->pushCriteria(new PriceAboveCriteria(45000));
//        return response()->json(count($this->repository->all()));
        return view('pages.search', ['products' => $this->repository->all(), 'categories' => $repository->getFilterCats(), 'searchQuery' => $search]);
	}

    public function postSearch()
    {
        $cats = Input::get('cats');
        $search = Input::get('search');
        $priceabove = Input::get('priceabove');
        $pricebelow = Input::get('pricebelow');
        if ($cats) $this->repository->pushCriteria(new CategoryCriteria($cats));
        if ($search) $this->repository->pushCriteria(new SearchQueryCriteria($search));
        if ($priceabove) $this->repository->pushCriteria(new PriceAboveCriteria($priceabove));
        if ($pricebelow) $this->repository->pushCriteria(new PriceBelowCriteria($pricebelow));
        return response()->json($this->repository->all());
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
        $files = Input::file('images');
        $dir = public_path() . '/uploads/products/' . $globex->id . '/';
        if(!File::exists($dir)) {
            mkdir($dir, 0777, true);
        }
        foreach ($files as $file) {
            if($file != null) {
                $filename = sha1($file->getClientOriginalName() . time());
                $extension = $file->getClientOriginalExtension();
                $imgdata = [
                    'product_id' => $product->id,
                    'url' => url('/uploads/products/' . $globex->id . '/' . $filename . '.' . $extension)
                ];
                $product->images()->create($imgdata);
                $file->move($dir, $filename . '.' . $extension);
            }
        }
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
        $related = $product->related();
        return view('pages.product.show', ['product' => $product, 'related' => $related]);
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
        Product::destroy($id);
	}

}
