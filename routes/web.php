<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home','HomeController@index');
Route::get('book/{id}','HomeController@GetBook');
Route::post('/book','HomeController@PostBook');
Route::get('payment/{id}','HomeController@GetPay');
Route::post('payment','HomeController@PostPay');

Auth::routes();

Route::get('file/{jenis}/{filename}', function($jenis, $filename){
	$path = storage_path().'/'.$jenis.'/'.$filename;
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file);
	$response->header("content-Type",$type);
	return $response;

});

Route::post('login','Auth\LoginController@login');
// Route::post('login','ItemController@tesLogin');


Route::get('index', 'HomeController@index');

Route::group(['middleware'=>'role:admin'],function(){
	Route::get('admin/home','AdminController@index');
	Route::get('admin/mail','AdminController@GetMail');
	Route::get('admin/status','AdminController@GetStatus');	
	Route::get('admin/input/{id}','AdminController@GetInput');
	Route::post('admin/input','AdminController@PostInput');
	Route::get('admin/inputs','AdminController@GetInputs');	
	Route::post('admin/inputs','AdminController@PostInputs');
	Route::get('admin/compose','AdminController@GetCompose');
	Route::post('admin/compose','AdminController@PostCompose');
	Route::get('admin/room','AdminController@GetRoom');
	Route::post('admin/room','AdminController@PostRoom');
	Route::get('admin/detail/{id}','AdminController@GetDetail');
	Route::post('admin/del/{id}','AdminController@PostDel');
});

Route::group(['middleware'=>'role:accounting'],function(){
	Route::get('account/home','PaymentController@index');
	Route::get('account/table','PaymentController@GetTable');
	Route::get('account/status','PaymentController@GetPayment');
	Route::get('account/detail/{id}','PaymentController@GetDetail');
	Route::get('account/print/{id}','PaymentController@GetPrint');
	Route::post('account/payment','PaymentController@PostPay');
});

Route::group(['middleware'=>'role:stockop'],function(){
	Route::get('warehouse/home','ItemController@index');
	Route::get('warehouse/listi','ItemController@GetListi');	
	Route::get('warehouse/listp','ItemController@GetListp');
	Route::get('warehouse/create','ItemController@GetCreate');
	Route::post('warehouse/create','ItemController@PostCreate');
	Route::get('warehouse/package' ,'ItemController@GetPackage');
	Route::post('warehouse/package','ItemController@PostPackage');
});

Route::get('logout','Auth\LoginController@logout');



Route::get('test', 'TestController@test');