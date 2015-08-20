<?php namespace App\Http\Controllers;

use App\Emirate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use Input;
use App\Customer;

class ProfileController extends Controller {

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
        $customer = Auth::customer()->get();
        if(!count($customer->profile)) {
            $profile = Profile::create([
                'customer_id' => Auth::customer()->get()->id
            ]);
        }
        return redirect()->route('profile.edit', $profile);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
        $profile = Profile::find($id);
        return view('pages.editprofile', ['profile' => $profile, 'emirates' => Emirate::all()]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = [
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'address' => Input::get('address'),
            'pin' => Input::get('pin'),
            'emirate_id' => Input::get('emirate_id'),
            'phone' => Input::get('phone'),
        ];
//          return response()->json($data);
            Profile::find($id)->update($data);
        return redirect('/home');
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
