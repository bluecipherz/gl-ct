<?php namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Advertisement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class AdvertisementController extends Controller {

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
        return view('pages.adposts')->with('categories', Category::whereIsRoot()->first()->children->all());
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
            'category_id' => $request->get('category_id'),
            'title' => $request->get('adtitle'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ];
        $ad = Advertisement::create($attributes);
//        $images = $request->file('images');
//        foreach ($images as $image) {
//            $ad->images()->create([
//                'customer_id' => Auth::customer()->get()->id,
//                'post_id' => $ad->id,
//                'type' => 2, // 2 for reseller ad
//                'thumb' => $image->getClientOriginalName()
//            ]);
//        }
        $source = public_path() . '/uploads/temp/' . Session::getId() . '/';
        $destination = public_path() . '/uploads/ads/' . $ad->id . '/';
        $files = scandir($destination);
        foreach ($files as $file) {
            if(in_array($file, ['.', '..'])) continue;
            if (copy($source . $file, $destination . $file)) {
                $delete[] = $source . $file;
            }
        }
        foreach ($delete as $file) {
            unlink($file);
        }
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
