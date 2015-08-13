<?php namespace App\Http\Controllers;

use Auth;
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
	public function create(CategoryRepository $categoryRepository)
	{
        return view('pages.adposts')->with('categories', $categoryRepository->getCats());
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
        $ad = Advertisement::create(array_merge($attributes, $request->except('_token')));
        $source = public_path() . '/uploads/temp/' . Session::getId() . '/';
        $destination = public_path() . '/uploads/ads/' . $ad->id . '/';
        if(!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }
        $files = scandir($source);
        $delete = [];
        foreach ($files as $file) {
            if(in_array($file, ['.', '..'])) continue;
            if (copy($source . $file, $destination . $file)) {
                $delete[] = $source . $file;
                $ad->images()->create([
                    'customer_id' => Auth::customer()->get()->id,
                    'advertisement_id' => $ad->id,
                    'url' => url('/uploads/ads/' . $ad->id . '/' . $file)
                ]);
            }
        }
        foreach ($delete as $file) {
            unlink($file);
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
