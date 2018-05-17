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
	Route::get('/', 'HomeController@home');
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/activate', 'ActivateController@index');
	
	Route::get('/perfil', 'PerfilController@index');
	Route::get('/perfil/edit/{id}', 'PerfilController@edit');
	Route::post('/perfil/edit/{id}', 'PerfilController@update');

	Route::get('/notification/{type}/{id}', 'NotificationsController@index');

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


		if(!\File::exists($path)) {
			return redirect('/perfil');
		}
		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});
});