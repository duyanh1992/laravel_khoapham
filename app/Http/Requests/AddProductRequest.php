<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddProductRequest extends Request {

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
			'slt'=>'required',
			'txtName'=>'required|unique:cates,name',
			'txtPrice'=>'required',
			'txtIntro'=>'required',
			'txtContent'=>'required',
			'fImages'=>'required'
		];
	}

	public function messages(){
		return [
			'slt.required'=>'please enter the cate name',
			'txtName.required'=>'please enter the product name',
			'txtName.unique'=>'please choose other product name',
			'txtPrice.required'=>'please enter the product price',
			'txtIntro.required'=>'please enter the product intro',
			'txtContent.required'=>'please enter the product content',
			'fImages.required'=>'please select product image'
		];
	}

}
