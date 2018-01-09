<?php namespace App\Http\Controllers;
if (!isset($_SESSION)) {
  session_start();
}
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;

use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use App\ProductImage;
use DB, File;

class ProductController extends Controller {
  public function getAdd(){
    $cateData = Cate::select('id','name', 'parent_id')->get()->toArray();
    return view('admin.product.add', compact('cateData'));
  }

  public function postAdd(Request $request){
    //check if image is uploaded:
    if($request->hasFile('fImages')){
      // get file:
      $file = $request->file('fImages');

      //get file name:
      $fileName = $file->getClientOriginalName('myFile');

      //move file:
      $file->move('public/images', $fileName);

      //Add another information:
      $addProduct = new Product();
      $addProduct->name = $request->txtName;
      $addProduct->alias = $request->txtName;
      $addProduct->price = $request->txtPrice;
      $addProduct->intro = $request->txtIntro;
      $addProduct->content = $request->txtContent;
      $addProduct->image = $fileName;
      $addProduct->keywords = $request->txtKeywords;
      $addProduct->description = $request->txtDescription;
      $addProduct->user_id = $_SESSION['currentUser']->id;
      $addProduct->cate_id = $request->slt;
      $addProduct->save();
    $productId = $addProduct->id;
    if ($request->hasFile('fDetailImages')) {
      // echo "<pre>";
      // print_r($request->file('fDetailImages'));
      // echo "</pre>";
      $detailImages = $request->file('fDetailImages');
      foreach ($detailImages as $detailImage) {
        $uploadDetailImage = new ProductImage();
        if (isset($detailImage)) {
          $uploadDetailImage->images = $detailImage->getClientOriginalName();
          $uploadDetailImage->product_id = $productId;
          $detailImage->move('public/images/detailImg', $detailImage->getClientOriginalName());
          $uploadDetailImage->save();
        }
      }
    }
    }
    return redirect()->route('getProductList');
  }

  public function getList(){
    $getListProduct = Product::select('id','name', 'price', 'created_at', 'cate_id')->get();
    return view('admin/product/list', compact('getListProduct'));
  }

  public function getDeleteProduct($id){
    // delete detail image:
    $detailImages = Product::find($id)->pimages->toArray();
    foreach ($detailImages as $key => $detailImage) {
      File::delete('public/images/detailImg/'.$detailImage['images']);
    }

    //delete main image:
    $product = Product::find($id);
    File::delete('public/images/'.$product->image);

    //Delete product (and delete data in product image table):
    $product->delete();
    return redirect()->route('getProductList');
  }

  public function getEditProduct($id){
    $cateData = Cate::select('id', 'name', 'parent_id')->get();

    $productData = Product::select('cate_id', 'name', 'price', 'intro', 
                                  'content', 'image', 'keywords', 'description', 'user_id')
                            ->where('id', $id)
                            ->first();

    $detailImages = Product::find($id)->pimages->toArray();
    // echo "<pre>";
    // print_r($detailImage);  
    // echo "</pre>";

    return view('admin.product.edit', compact('cateData', 'productData', 'detailImages'));
  }

   public function postEditProduct(){
    
  }
}
