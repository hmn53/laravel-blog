<?php

use App\Blog;
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

Route::get('/', 'PagesController@redirect');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create','PagesController@create');
Route::post('store', 'PagesController@store');

Route::get('show/{id}', function ($id) {
    if(Auth::guest()){
        return redirect('/home');
    }
    $blog = Blog::find($id);
    return view('pages.show')->with('blog',$blog);
});

Route::get('edit/{id}', function ($id) {
    if(Auth::guest()){
        return redirect('/home');
    }
    $blog = Blog::find($id);
    return view('pages.edit')->with('blog',$blog);
});

Route::post('update/{id}','PagesController@update');
Route::post('delete/{id}', 'PagesController@delete');
