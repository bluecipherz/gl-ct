<?php namespace App\Http\Controllers;

use App\HomeGrid;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeGridController extends Controller {

    public function reset()
    {
        HomeGrid::with('slots')->delete();
        return redirect()->back();
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
//        return response()->json($request->get('data'));
        foreach($request->get('data') as $hg) {
            $grid = HomeGrid::create([
                'name' => $hg['name'],
                'rows' => $hg['rows'],
                'cols' => $hg['cols']
            ]);
            foreach($hg['slots'] as $st) {
                $grid->slots()->create([
                    'product_id' => $st['product_id']
                ]);
            }
        }
        return response()->json('Grid Created');
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
		HomeGrid::find($id)->delete();
	}

}
