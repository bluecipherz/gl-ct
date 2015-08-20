<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Category;
use Input;

class CategoryController extends Controller {

    public function all(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Category::all());
        }
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
