<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Category;
use Input;

class CategoryController extends Controller {

    public function getProducts()
    {
        $cats = Input::get('cats');
//        $cats = [1, 63, 74, 97, 1227, 1356];
        $search = Input::get('search');
//        $search = 'as';
        $products = new Collection;
        if ($cats && $search) {
//            echo 'qwe';
            foreach ($cats as $id) {
                $product_list = Category::find($id)->childProducts();
                $query = Product::with('images')->whereIn('id', $product_list);
                $searchTerms = explode(' ', $search);
                foreach ($searchTerms as $term) {
                    $query->where('title', 'LIKE', '%' . $term . '%');
                }
                $products = $products->merge($query->get());
            }
        } else if ($cats) {
//            echo 'zxc';
            foreach ($cats as $id) {
                $product_list = Category::find($id)->childProducts();
                $query = Product::with('images')->whereIn('id', $product_list);
                $products = $products->merge($query->get());
            }
        } else if ($search) {
//            echo 'asd';
            $query = Product::with('images');
            $searchTerms = explode(' ', $search);
            foreach ($searchTerms as $term) {
                $query->where('title', 'LIKE', '%' . $term . '%');
            }
            $products = $products->merge($query->get());
        }
//        return response()->json($products->count());
        return response()->json($products);
    }

    public function children($id)
    {
        $category = Category::find($id);
        if($category) {
            return response()->json($category->children->all());
        }
    }

    public function all()
    {
        return response()->json(Category::all());
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

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
	public function store()
	{
        $name = Input::get('name');
        $level = Input::get('level');
        $parent = Input::get('parent');

        $node = Category::create(['name' => $name]);
        if ($level > 0) {
            $node->makeChildOf(Category::find($parent));
        } else {
            $node->makeRoot();
        }
        return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $category = Category::find($id);
        $ads = $category->products;
        return view('pages.category', compact('category'));
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
        Category::find($id)->update([
            'name' => Input::get('name')
        ]);
        return response()->json('success');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Category::find($id)->delete();
        return redirect()->back();
	}

}
