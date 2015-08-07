<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'images' => 'required',
//			'thumb' => 'required|mimes:jpeg,bmp,png',
            'type' => 'required|integer',
		];
	}

    public function messages()
    {
        return [
            'images.required' => 'Pick a file to upload.',
//            'image.mimes' => 'Not a valid file type. Valid types include jpeg, bmp, png.',
        ];
    }

}
