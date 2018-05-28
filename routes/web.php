<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/activate/{id}', 'ActivateController@activate');
Route::post('/activate/ignore/{id}', 'ActivateController@ignore');
Route::post('/perfil/edit/{id}', 'PerfilController@update');
Route::post('/perfil/deleteSkill/{exp_id}', 'PerfilController@deleteSkill');
Route::post('/oferts/{id}', 'OfertaController@delete');
Route::post('/oferts/create/{user_id}', 'OfertaController@save');
Route::post('/oferts/edit/{user_id}/{ofert_id}', 'OfertaController@update');
Route::post('/apply/add/{oferta_id}/{user_id}', 'OfertaController@apply');
Route::post('/apply/delete/{oferta_id}/{user_id}', 'OfertaController@delete_apply');

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]], function()
{
	Route::get("/language/{language}", function($language){
		if($language === "spanish"){
			\Session::put('locale','es');
			LaravelLocalization::setLocale('es');
		}elseif($language === "english"){
			\Session::put('locale','en');
			LaravelLocalization::setLocale('en');
		}elseif($language === "italian"){
			\Session::put('locale','it');
			LaravelLocalization::setLocale('it');
		}
		return redirect("/");
	});

	Route::get('/users', 'UserController@userComplete');
	Route::get('/', 'HomeController@home');
	Auth::routes();
	Route::get('/statistics', 'HomeController@statistics');
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/activate', 'ActivateController@index');
	
	Route::get('/perfil', 'PerfilController@index');
	Route::get('/perfil/edit/{id}', 'PerfilController@edit');
	
	Route::get('/student/{id}', 'StudentController@show');
	Route::get('/company/{id}', 'CompanyController@show');

	//interview
	Route::get('/interview/accept/{user_id}/{oferta_id}', 'InterviewController@accept');
	Route::get('/interview/delete/{user_id}/{oferta_id}', 'InterviewController@reject');

	Route::get('/oferts/{id}', 'OfertaController@index');
	Route::get('/ofert/{id}', 'OfertaController@show');
	Route::get('/oferts/{user_id}/{ofert_id}/edit', 'OfertaController@edit');
	Route::get('/oferts/create/{user_id}', 'OfertaController@create');
	Route::get('/interview/{id}', 'OfertaController@interview');
	Route::get('/notification/{type}/{id}', 'NotificationsController@index');
	Route::get('/my_requests/{id}', 'StudentController@index');

	Route::get('/images/{filename}',function($filename){
		$path = storage_path("app/images/$filename");


		if(!\File::exists($path)) abort(404);
		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});
	Route::get('/cvs/{filename}',function($filename){
		$path = storage_path("app/cvs/$filename");


		if(!\File::exists($path)) abort(404);
		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});
	Route::get('/exp/{filename}',function($filename){
		$path = storage_path("app/exp/$filename");


		if(!\File::exists($path)) abort(404);
		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});
	Route::get('/ofr/{filename}',function($filename){
		$path = storage_path("app/ofr/$filename");


		if(!\File::exists($path)) abort(404);
		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});
});
