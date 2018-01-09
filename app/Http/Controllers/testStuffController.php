<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class testStuffController extends Controller {
	public function getUploadFile(){
		return view('test/uploadForm');
	}
	
	public function postUploadFile(Request $request){
		//check if the file exists
		if($request->hasFile('myFile')){
			//get file:
			$file = $request->file('myFile');
			
			//get file name:
			$fileName = $file->getClientOriginalName('myFile');
			
			//upload file:
			$file->move('public/images',$fileName);
		}
		else{
			echo "NO";
		}
	}
}

