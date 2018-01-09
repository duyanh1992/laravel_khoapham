<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use Illuminate\Http\Request;
use App\Cate;

class CateController extends Controller {
  public function getAdd(){
  	$cateData = Cate::select('id','name', 'parent_id')->get()->toArray();
    return view('admin.cate.add', compact('cateData'));
  }

  public function postAdd(CateRequest $request){
    $cate = new Cate();
    $cate->name = $request->txtCateName;
    $cate->alias = $request->txtCateName;
    $cate->order = $request->txtOrder;
    $cate->parent_id = $request->slt;
    $cate->keywords  = $request->txtKeyWords;
    $cate->description = $request->txtDescription;
    $cate->save();
    return redirect()->route('getListCate')->with(['flash_message'=>'Adding category successful !!!', 'flash_level'=>'success']);
  }

  public function getCateList(){
    $cateList = Cate::select('id', 'name', 'parent_id')->get();
    return view('admin/cate/list', compact('cateList'));
  }

  public function getEditCate($id){
    $currentCateData = Cate::find($id);
    $cateData = Cate::select('id','name', 'parent_id')->get()->toArray();
    return view('admin.cate.edit', compact('currentCateData','cateData'));
  }

  public function postEditCate($id, Request $request){
    //echo $id;
    $this->validate($request,
      ['txtCateName'=>'required'],
      ['txtCateName.required'=>'Please enter cate name']
    );

    $editCate = Cate::find($id);
    print_r($editCate);
    $editCate->name = $request->txtCateName;
    $editCate->alias = $request->txtCateName;
    $editCate->order = $request->txtOrder;
    $editCate->parent_id = $request->slt;
    $editCate->keywords = $request->txtKeywords;
    $editCate->description = $request->txtDescription;
    $editCate->save();

    return redirect()->route('getListCate');
  }

  public function getDeleteCate($id){
    $checkParent = Cate::where('parent_id',$id)->count();
    if ($checkParent == 0) {
      $delCate = Cate::find($id);
      $delCate->delete();
      return redirect()->route('getListCate');
    }
  	else{
      echo "<script type='text/javascript'>
                alert('Bạn không thể xóa !!!');
                window.location = '";
                  echo route('getListCate');
                echo "';
            </script>";
    }
  }
}
