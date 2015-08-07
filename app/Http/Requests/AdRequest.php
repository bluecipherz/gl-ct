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
			'adtitle' => 'required',
			'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required',
            'customername' => 'required',
            'customerpin' => 'required',
            'customeraddress' => 'required',
            'customerstate' => 'required',
            'customercity' => 'required',
            'customerphone' => 'required'
		];
	}

}
