<?php
use App\Greeting;
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
    return view('welcome');
});

Route::get('layouts/try', function () {
    return view('layouts.try');
});

//Auth::routes();
Auth::routes(['verify' => false]);
Route::get('/home', 'HomeController@index')->name('home');

//Fetch the records for the user
Route::resource('dashboard','Stock_detailController',['names' => [
    'store' => 'dashboard',
    'update' => 'editStocks',
    'show'=>'sees',
    'destroy' => 'delete', 
]]);
Route::get('history','Stock_detailController@history');



//Route::resource('stock','Stock_detailController');

// Route::get('dashboard/{id}','HomeController@index');
//Http::routes()
//  Route::resource('welcome','AdminController')->middleware('admin_verify');
//facades
//Middleware

//Route::post('/welcome','AdminController@create')->middleware('admin_verify');