<?php
namespace App\Http\Controllers;
if (!isset($_SESSION)) {
	session_start();
}
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;

use App\User;
use Hash;

class UserController extends Controller {

	public function getLogin(){
		return view('admin.login');
	}

	public function postLogin(LoginRequest $request){
		$username = $request->username;
		$password = $request->password;

		$checkUser = User::select('id', 'username', 'password', 'email')
						->where('username', $username)
						->where('password', md5($password))
						->get()->first();
		if(count($checkUser)>0){
			$_SESSION['currentUser'] = $checkUser;
			//return url('admin/user/getList/'.$checkUser->id);
			return redirect()->route('getUserList');
			// echo "<pre>";
			// print_r($_SESSION['currentUser']->username);
			// echo "</pre>";
		}
		else{
			$errorLogin = '<p style="color:red;font-weight:bold;">Username or password is wrong !!!</p>';
			return view('admin.login', compact('errorLogin'));
		}
	}

	public function getList(){
		$getUserList = User::select('id', 'username', 'level')->get();
		return view('admin.user.list', compact('getUserList', 'currentUser'));
	}

	public function getAdd(){
		return view('admin.user.add');
	}

	public function postAdd(UserRequest $request){
		$addUser = new User();
		$addUser->username = $request->txtUser;
		$addUser->password = md5($request->txtPass);
		$addUser->email = $request->txtEmail;
		$addUser->level = $request->rdoLevel;
		$addUser->remember_token = $request->_token;
		$addUser->save();
		return redirect()->route('getUserList');
	}

	public function getDelete($id){
		$delUser = User::find($id);

		if ($delUser->level != 1){
			$delUser->delete();
			return redirect()->route('getUserList'); 
		}
		else{
			return redirect()->route('getUserList'); 
		}
	}

	public function getEdit(){
		
	}

	public function postEdit(){
		
	}

}
