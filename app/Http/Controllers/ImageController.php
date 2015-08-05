<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ImageRequest;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller {

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
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
	public function store(ImageRequest $request)
	{
		// Merge the name of the file being uploaded into the Input array so it can be saved to the database.
        Input::merge(array('name' => Input::file('image')->getClientOriginalName()));
        // Use the repository method "processPost" to populate and create a new instance of the model
        if ($this->imageRepository->processUpload(null, Input::all())) {
            // Fire an event to move the uploaded file to permanent storage
            Event::fire(new Upload($this->imageRepository));
            return response()->json(['status' => 'true', 'message' => 'Successfully uploaded']);
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
