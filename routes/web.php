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
Route::post('/sell/{}','Stock_detailController@sell');
//Fetch the records for the user
Route::resource('dashboard','Stock_detailController',['names' => [
    'store' => 'dashboard',
    'update' => 'editStocks',
    'show'=>'sees',
    'destroy' => 'delete', 
]]);
Route::resource('user','HomeController',['names' => [
    'show'=>'profile',    
]]);

Route::get('history','Stock_detailController@history');
/*--------------------Routes directing to admin-----------------------------------*/

// Route::get('admin', ['middleware' =>'admin',function(){
//     return "Hello This is admin panel";
// }]);
// Route::middleware(['admin'])->group(function(){
//     Route::get('/',function(){
//         return "you are inside admin panel";
//     });
// });
/*------------------------------------------------------------------------------------*/ 
//uses two middleware (basically for the idea of using two middleware first to know users and then admins)
// Route::middleware(['users', 'admins'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second Middleware
//     });
//     Route::get('user/profile', function () {
//         // Uses first & second Middleware
//     });
// });

/* -------------------------------------------------------------------------------------*/
//Route::resource('stock','Stock_detailController');

// Route::get('dashboard/{id}','HomeController@index');
//Http::routes()
//  Route::resource('welcome','AdminController')->middleware('admin_verify');
//facades
//Middleware

//Route::post('/welcome','AdminController@create')->middleware('admin_verify');