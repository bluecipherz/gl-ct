<?php namespace App\Http\Controllers;

use App\Http\Requests;

use League\Flysystem\Util\MimeType;
use Request;
use Response;
use Input;
use Session;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Validator;
use File;

class ResellerImageController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $file = Input::file('file');
        $rules = array(
//            'file' => 'image|max:3000',
            'file' => 'max:3000',
        );
        $validation = Validator::make([
            'file' => $file
        ], $rules);
        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }
        $extension = $file->getClientOriginalExtension();
        $directory = public_path() . '/uploads/temp/' . Session::getId() . '/';
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $filename = sha1(time() . time()) . ".{$extension}";
        $upload_success = $file->move($directory, $filename);
        if ($upload_success) {
            return response()->json($filename, 200);
        } else {
            return response()->json('error', 400);
        }
	}

    public function destroy() {
        $filename = Input::get('file');
        $dir = public_path() . '/uploads/temp/' . Session::getId() . '/';
        unlink($dir . $filename);
        return response()->json('deleted');
    }

    public function all()
    {
        $dir = public_path() . '/uploads/temp/' . Session::getId() . '/';
        $data = [];
        $mimetypes = new Mimetype;
        foreach(scandir($dir) as $file) {
            if(in_array($file, ['.', '..'])) continue;
            $filedata = [];
            $filedata['name'] = $file;
            $filedata['url'] = url('/uploads/temp/' .Session::getId() . '/' .$file);
            $filedata['size'] = File::size($dir . $file);
            $filedata['type'] = $mimetypes->detectByFileExtension(File::extension($file));
            $data[] = $filedata;
        }
        return $data;
    }

    public function last()
    {
        $images = Input::file('images');
        $destination = public_path() . '/uploads/temp/' . Session::getId();
        if(!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }
        Session::put('files', 0);
        foreach ($images as $image) {
//			$filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $filename = Session::get('files') + 1;
            $image->move($destination, $filename. '.' .$extension);
            Session::put('files', $filename);
        }
        // return JsonResponse::create(Input::all());
        return response(Session::getId());
    }


    public function dev() {
        $image = Input::file('image');
        // Merge the name of the file being uploaded into the Input array so it can be saved to the database.{}{}
        Input::merge(array('name' => $image->getClientOriginalName()));
        // Use the repository method "processPost" to populate and create a new instance of the model
        if ($this->imageRepository->processUpload(Input::all())) {
            // Fire an event to move the uploaded file to permanent storage
            Event::fire(new Upload($this->imageRepository));
            return response()->json(['status' => 'true', 'message' => 'Successfully uploaded']);
        }
    }

}
