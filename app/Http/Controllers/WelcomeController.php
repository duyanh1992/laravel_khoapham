<?php namespace App\Http\Controllers;
use DB,Mail;
use Illuminate\Http\Request;
use Cart;
use Validator;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$listFeaturedProduct = DB::table('')
		return view('user.pages.home');
	}

	public function getRegister()
	{
		return view('user.pages.register');
	}

	public function postRegister(Request $request)
	{
		$v = Validator::make($request->all(), 
			[
				'username'=>'required|unique:users,username|max:8',
				'email'=>'required|email',	
				'password'=>'required|confirmed|min:6'
			]			
		);

		if ($v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}
		else{
			echo "Success";
		}
	}

	public function getMemberLogin()
	{
		return view('user.pages.login');
	}

	public function postMemberLogin(Request $request)
	{
		
	}

	public function getSubCategory($cate_id){
		$listParentCate = DB::table('cates')
							->select('id', 'name', 'parent_id')
							->where('parent_id', 0)
							->get();	

		$listProduct = DB::table('products')
							->where('cate_id',$cate_id)
							->paginate(1);
		// echo "<pre>";	
		// print_r($listProduct);				
		// echo "</pre>";	
		// die();
		return view('user.pages.cate', compact('listProduct', 'listParentCate'));
	}

	public function getCategory($cate_id){
		$listParentCate = DB::table('cates')
							->select('id', 'name', 'parent_id')
							->where('parent_id', 0)
							->get();

		$listProduct = DB::table('cates')
						->join('products', 'products.cate_id', '=', 'cates.id')
						->where('cates.parent_id', $cate_id)
						->paginate(1);

		// echo "<pre>";				
		// print_r($listProduct);
		// echo "</pre>";
		// die();
		// echo "<pre>";
		// print_r($listProduct);
		// echo "</pre>";
		return view('user.pages.cate', compact('listProduct', 'listParentCate'));
	}

	public function getDetailProduct($product_id){
		$detailProduct = DB::table('products')->select('id', 'name', 'price', 'image')
							->where('id', $product_id)
							->first();	
		// echo "<pre>";
		// print_r($detailProduct);
		// echo "</pre>";	

		return view('user.pages.product', compact('detailProduct'));
				
	}

	public function sendMailGet()
	{
		return view('user.pages.contact');
	}

	public function sendMailPost(Request $request)
	{
		$data = ['name'=>Request::input('name'), 'msg'=>Request::input('message')];
		Mail::send('user.blocks.mailResponse', $data, function($message){
			$message->from('alyssachia1992@gmail.com', 'Boss');
			$message->to('duyanh3392@gmail.com', 'Duy Anh')->subject('Đây là mail phản hổi');
		});
	}

	public function addToCart($product_id)
	{
		$getProduct = DB::table('products')
						->select('id', 'name', 'price', 'image')
						->where('id', $product_id)
						->first();

		Cart::add(array('id'=>$getProduct->id, 'name'=>$getProduct->name, 'qty'=>1, 'price'=>$getProduct->price, 'options'=>array('image'=>$getProduct->image)));
		// $cartContent = Cart::content();
		// echo "<pre>";
		// foreach($cartContent as $item){
		// 	echo ($item['options']->image."<br />");
		// }
		//print_r($cartContent['name']);
		//echo "</pre>";
		return redirect()->route('viewYourCart');
	}

	public function viewYourCart()
	{
		$cartContent = Cart::content();
		$cartTotal = Cart::total();
		return view('user.pages.shopping', compact('cartContent','cartTotal'));
	}

	public function delYourCart($rowId)
	{
		Cart::remove($rowId);
		return redirect()->route('viewYourCart');
	}
}
