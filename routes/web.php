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

Route::get('/', 'HomeController@index')->middleware('auth');


//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/user/home','HomeController@index')->name("home");
Route::get('/activities','HomeController@activities');

Route::get('/addstocks',function(){
    return view('user.dashboard');
});
Route::match(['put', 'patch'],'sell/{id}', 'Stock_detailController@sell');
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
Route::middleware(['admin'])->group(function(){
    Route::get('/home','AdminController@index');
    Route::resource('admin/actions','AdminController');
    Route::get('/admin/allstocks','AdminController@allStocks'); 
    Route::get('/admin/activities','AdminController@allactivities');   
    Route::resource('admin/charges','ChargeController');
    Route::get('admin/addusers','AdminController@addusers');
   // Route::post('admin/charges/exchange','ChargeController@exchange');
   
});
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
