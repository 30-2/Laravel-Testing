<?php
use App\Http\Middleware\CheckAge;
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

Route::get('/', function () {
   // return view('welcome');
   $links = \App\Link::all();
   
   return view('welcome', ['links' => $links]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/', function() {
//	return 'All cats';
//});
Route::get('cats/{id}', function($id) {
	return sprintf('Cat #%s', $id);
});
Route::get('about', function() {
return view('about')->with('number_of_cats', 9000);
});
Route::get('cats', function() {
$cats = App\Cat::all();
return view('cats.index')->with('cats', $cats);
});
	Route::get('cats/breeds/{name}', function($name) {
		$breed = Postgres\Breed::with('cats')
		->whereName($name)
		->first();
		return view('cats.index')
		->with('breed', $breed)
		->with('cats', $breed->cats);
	});


// display data from database and check form authorization
Route::get('/catcontroller/index',[
		//'middleware' => 'First',
		'uses' => 'CatController@index'
])->middleware(CheckAge::class);

Route::group(['middleware' => 'can:is-admin'], function () {
	// insert single 1 line
	Route::get('/catcontroller/register',[
			//'middleware' => 'First',
			'uses' => 'CatController@create'
	]);
	//request cat store form
	Route::get('store',function(){
		
			return view('cats.storeform');
			
	})->middleware('auth');

});
//post action from store form
 /*Route::post('/cat/store',function()
{
   $rules = array(
		'name' => 'required',
		'birthdate' => 'required|min:8',
		'breedID' => 'required|min:8');
		
    $validator = Validator::make(Input::all(), $rules);
	
    if ($validator->fails())
    {
		Log::debug("error");
		$messages = $validator->messages();
		Log::debug($messages);
		return Redirect::to('store')->withErrors($validator);
		
	}
	else{
		//return array('uses'=>'CatController@store');
		return array('uses'=>'CatController@confirmation');
	}
	
});*/
Route::post('/cat/store',[
	//'middleware' => 'First',
	'uses' => 'CatController@store'
]);

//user
Route::get('/user', function()
{
    return view('users/user');
});
Route::post('/cat/save',[
	//'middleware' => 'First',
	'uses' => 'CatController@confirmation'
]);
Route::get('/cat/confirmation',function(){
	
		return view('cats.confirmation');
		
});
Route::get('/catcontroller/display',[
	//'middleware' => 'First',
	'uses' => 'CatController@display'
]);
//links test
Route::get('link',[
	'uses' => 'LinkController@index'
]
);
Route::get('/images/catalog/{filename}', function ($filename)
{
	//return Image::make(storage_path('/images/catalog/' . $filename))->response();
	return response()->file('/images/catalog/' . $filename);
});
Route::get('testblade',function(){
	
		return view('cats.testblade');
		
});
Route::get('user/register', [
	//'middleware' => 'First',
	'uses' => 'UserController@create'
]);
Route::post('/user/store',[
	//'middleware' => 'First',
	'uses' => 'UserController@store'
]);