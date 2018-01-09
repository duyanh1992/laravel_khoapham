<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::group(['prefix'=>'testStuff'], function(){
	Route::get('getUploadFile', ['as'=>'getUploadFile', 'uses'=>'testStuffController@getUploadFile']);
	Route::post('postUploadFile', ['as'=>'postUploadFile', 'uses'=>'testStuffController@postUploadFile']);
});

Route::group(['prefix'=>'login'], function(){
		Route::get('getLogin', ['as'=>'getUserLogin', 'uses'=>'UserController@getLogin']);
		Route::post('postLogin', ['as'=>'postUserLogin', 'uses'=>'UserController@postLogin']);
});

Route::group(['prefix'=>'admin','middleware'=>'checkAdmin'], function(){
	Route::group(['prefix'=>'cate'], function(){
		Route::get('getAdd',['as'=>'getAddCate', 'uses'=>'CateController@getAdd']);
		Route::post('postAdd',['as'=>'postAddCate', 'uses'=>'CateController@postAdd']);

		Route::get('list',['as'=>'getListCate', 'uses'=>'CateController@getCateList']);

		Route::get('getEdit/{id}',['as'=>'getEditCate', 'uses'=>'CateController@getEditCate']);
		Route::post('postEdit/{id}',['as'=>'postEditCate', 'uses'=>'CateController@postEditCate']);

		Route::get('getDelete/{id}',['as'=>'getDeleteCate', 'uses'=>'CateController@getDeleteCate']);
	});

	Route::group(['prefix'=>'product'], function(){
		Route::get('getList', ['as'=>'getProductList', 'uses'=>'ProductController@getList']);
		Route::get('getAdd', ['as'=>'getAddProduct', 'uses'=>'ProductController@getAdd']);
		Route::post('postAdd', ['as'=>'postAddProduct', 'uses'=>'ProductController@postAdd']);
		Route::get('getDelete/{id}', ['as'=>'getDeleteProduct', 'uses'=>'ProductController@getDeleteProduct']);

		Route::get('getEdit/{id}', ['as'=>'getEditProduct', 'uses'=>'ProductController@getEditProduct']);

		Route::post('postEdit/{id}', ['as'=>'postEditProduct', 'uses'=>'ProductController@postEditProduct']);
	});

	Route::group(['prefix'=>'user'], function(){
		Route::get('getList', ['as'=>'getUserList', 'uses'=>'UserController@getList']);
		Route::get('getAdd', ['as'=>'getAddUser', 'uses'=>'UserController@getAdd']);
		Route::post('postAdd', ['as'=>'postAddUser', 'uses'=>'UserController@postAdd']);
		Route::get('getDelete/{id}', ['as'=>'getDeleteUser', 'uses'=>'UserController@getDelete']);

		Route::get('getEdit/{id}', ['as'=>'getEditUser', 'uses'=>'UserController@getEdit']);

		Route::post('postEdit/{id}', ['as'=>'postEditUser', 'uses'=>'UserController@postEdit']);
	});
});

Route::get('testFrontend', function(){
	$parentCate = DB::table('cates')
                ->select('id', 'name', 'parent_id')
                ->where('parent_id',0)
                ->get();
    echo "<pre>";            
    echo ($parentCate->name);    
    echo "</pre>";           
});

Route::group(['prefix'=>'guest'], function(){
	Route::get('getRegister', ['as'=>'getRegister', 'uses'=>'WelcomeController@getRegister']);
	Route::post('postRegister', ['as'=>'postRegister', 'uses'=>'WelcomeController@postRegister']);

	Route::get('getMemberLogin', ['as'=>'getMemberLogin', 'uses'=>'WelcomeController@getMemberLogin']);
	Route::post('postMemberLogin', ['as'=>'postMemberLogin', 'uses'=>'WelcomeController@postMemberLogin']);

	Route::get('category/{cate_id}', ['as'=>'getCategory', 'uses'=>'WelcomeController@getCategory']);
	Route::get('sub-category/{cate_id}', ['as'=>'getSubCategory', 'uses'=>'WelcomeController@getSubCategory']);
	Route::get('product/{product_id}', ['as'=>'getDetailProduct', 'uses'=>'WelcomeController@getDetailProduct']);

	Route::group(['prefix'=>'contact'], function(){
		Route::get('sendMail', ['as'=>'sendMailGet', 'uses'=>'WelcomeController@sendMailGet']);
		Route::post('sendMail', ['as'=>'sendMailPost', 'uses'=>'WelcomeController@sendMailPost']);		
	});

	Route::group(['prefix'=>'shoppingcart'], function(){
		Route::get('add/{product_id}/{product_name}', ['as'=>'addToCart', 'uses'=>'WelcomeController@addToCart']);
		Route::get('viewCart',['as'=>'viewYourCart', 'uses'=>'WelcomeController@viewYourCart']);
		Route::get('delCart/{rowId}', ['as'=>'delYourCart', 'uses'=>'WelcomeController@delYourCart']);
	});
});
