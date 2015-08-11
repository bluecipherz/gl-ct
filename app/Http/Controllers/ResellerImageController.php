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
        if (!File::exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $filename = sha1($file->getClientOriginalName() . time()) . ".{$extension}";
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

    /**
     * Get all temporary images in session
     *
     * @return array
     */
    public function all()
    {
        $dir = public_path() . '/uploads/temp/' . Session::getId() . '/';
        $data = [];
        $mimetypes = new Mimetype;
        if(file_exists($dir)) {
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
