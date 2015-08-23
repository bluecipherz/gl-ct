<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdRequest extends Request {

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
			'title' => 'required',
			'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
//            'images' => 'required',
//            'quantity' => 'required',
            'name' => 'required',
            'pin' => 'required',
            'address' => 'required',
            'emirate_id' => 'required',
            'phone' => 'required'
		];
	}

}
