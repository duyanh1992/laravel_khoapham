<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
			'txtUser'=>'required|unique:users,username',
			'txtPass'=>'required',
			'txtRePass'=>'required|same:txtPass',
			'txtEmail'=>'required|email'
		];
	}

	public function messages(){
		return[
			'txtUser.required' =>'Please enter the user name',
			'txtUser.unique' =>'User name exists',
			'txtPass.required' =>'Please enter the password',
			'txtRePass.same' =>'Confirmation password is not match',
			'txtRePass.required' =>'Please enter the confirmation name',
			'txtEmail.required' =>'Please enter the email',
			'txtEmail.email' =>'Please enter the regular email'
		];
	}

}
