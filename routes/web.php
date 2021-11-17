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

use App\Http\Controllers\Pagecontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about',function(){
    return "this is about";
});

Route::get('contact',function(){
    return "this is contact";
});

Route::get('post/{id}',function($id){
    return "this is post id $id";
});

Route::get('comment/{id}',function($id='defaults'){
    return "this is comment $id";
});

Route::get("add/{num1}/{num2}",function($num1,$num2){
    return "the sum is ".$num1+$num2;
});

Route::get('service',function(){
    return view('services');
});

Route::get('about',function(){
    return view('about');
});

Route::get('contact',function(){    
    return view('contact');                                                                     
})->name('contactus');

// Route::get("controller_test/{aa}","Pagecontroller@c")->name('page.c');
Route::get("controller_test/{id}","Pagecontroller@detail")->name('page.detail');

Route::view('test','test');                                                                     //direct call views->test.blade.php

Route::get('dashboard/index','DashboardController@index')->name('dashboard.index');
Route::get('dashboard/create','DashboardController@create')->name('dashboard.create');
Route::get('dashboard/edit','DashboardController@edit')->name('dashboard.edit');


// Route::get('form',"Formcontroller@create")->name('form.create')->middleware('auth');         //here we can protect with middleware, directly to specific route
Route::get('form',"Formcontroller@create")->name('form.create');
Route::post('form',"Formcontroller@store")->name('form.store');
Route::get ('form_delete/{id}','Formcontroller@delete')->name('form.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('denied','denied')->name('denied');





