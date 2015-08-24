<?php namespace App\Http\Controllers;

use App\Emirate;
use App\Motor;
use App\Product;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Session;
use App\Category;
use App\Advertisement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdRequest;
use App\Repositories\CategoryRepository;
use Request;
use Input;

class AdvertisementController extends Controller {

    public function __construct()
    {
//        $this->middleware('auth', ['index']);
    }

    public function stateAds(Emirate $emirate, CategoryRepository $categoryRepository)
    {
//        return $emirate->advertisements->count();
        $products = new Collection;
        foreach ($emirate->advertisements as $ad) {
            $products->add($ad->product);
        }
        return view('pages.search', ['products' => $products, 'categories' => $categoryRepository->getFilterCats()]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [
            'myads' => Auth::customer()->get()->advertisements,
            'cats' => Category::whereDepth(2)->lists('name', 'id')
        ];
        return view('pages.myads', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(CategoryRepository $categoryRepository)
	{
        return view('pages.adposts', ['categories' => $categoryRepository->getCats(), 'emirates' => Emirate::all()]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(AdRequest $request)
	{
		$attributes = [
            'customer_id' => Auth::customer()->get()->id,
        ];
        $category = Category::find($request->get('category_id'));
        if ($category->isDescendantOf(Category::find(1))) { // motors
            $motor = Motor::create($request->only('chassis_no', 'model', 'color', 'doors'));
            $ad = $motor->advertisements()->create(array_merge($attributes, $request->only(['name', 'pin', 'address', 'emirate_id', 'phone'])));
        } else {
            $ad = Advertisement::create(array_merge($attributes, $request->only(['name', 'pin', 'address', 'emirate_id', 'phone'])));
        }
        // array_merge = add two arrays together
        $product = Product::create($request->only(['title', 'description', 'brand', 'category_id', 'price']));
        $ad->product()->save($product);
        $source = public_path() . '/uploads/temp/' . Session::getId() . '/';
        $destination = public_path() . '/uploads/ads/' . $ad->id . '/';
        if(!file_exists($destination)) {
            mkdir($destination, 0777, true); // create directory if doesn't exists
        }
		if(file_exists($source)) { // check if directory exists
			$files = scandir($source); // list files in directory
			$delete = [];
			foreach ($files as $file) {
				// in_array() = check for values in array
				if(in_array($file, ['.', '..'])) continue;
				if (copy($source . $file, $destination . $file)) {
					$delete[] = $source . $file;
	//                $ad->images()->create([
	//                    'customer_id' => Auth::customer()->get()->id,
	//                    'advertisement_id' => $ad->id,
	//                    'url' => url('/uploads/ads/' . $ad->id . '/' . $file)
	//                ]);
					$product->images()->create([
	//                    'product_id' => $product->id,
						'url' => url('/uploads/ads/' . $ad->id . '/' . $file)
					]);
				}
			}
			foreach ($delete as $file) {
				unlink($file); // delete file
			}
		}
        return response()->json('success');
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
        $related = Product::with('images')->whereCategoryId($product->category->id)->where('id', '!=', $product->id)->take(5);
        return view('pages.product.show', ['product' => $product, 'related' => $related]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//        return response()->json(Input::all());
        $ad = Advertisement::find($id);
        $productData = [
            'title' => Input::get('title'),
            'price' => Input::get('price'),
            'description' => Input::get('description'),
            'brand' => Input::get('brand'),
            'category_id' => Input::get('category_id'),
        ];
        $ad->product->update($productData);
        $adData = [
            'name' => Input::get('name'),
            'pin' => Input::get('pin'),
            'address' => Input::get('address'),
            'state' => Input::get('state'),
            'city' => Input::get('city'),
            'phone' => Input::get('phone'),
            'quantity' => Input::get('quantity'),
        ];
        $ad->update($adData);
        if ($ad->advertisable_type == 'App\Motor') {
            $motorData = [
                'chassis_no' => Input::get('chassis_no'),
                'model' => Input::get('model'),
                'color' => Input::get('color'),
                'doors' => Input::get('doors'),
            ];
            $ad->advertisable->update($motorData);
        }
        return response()->json('Updated');
	}

    public function step1()
    {
        $address = Input::get('address');
        Session::put('address', $address);
    }

    public function step2($id)
    {
        //
    }

}
