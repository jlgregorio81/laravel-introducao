<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/user/profile', function () {
    return "My Profile!";
})->name('profile');

Route::get('/helloworld/{name}/{email?}', function ($name, $email = null){
    echo "<h1>Hello World!</h1>";
    echo "<h2>User: $name </h2>";
    echo $email ?  "<h2>User: $email </h2>" : '';
})->where(['name' => '[A-Za-z]+' , 'email' => '[a-z]+'] ); 

Route::prefix('/app')->group( function (){
    
    Route::get('/', function(){
        $url = route('user'); //..cria a URL
        echo "<a href=\"$url\"> My User </a><br>";        
        return "My App!";
    });
    
    Route::get('/user', function(){
        $url = route('profile'); //..cria a URL
        echo "<a href=\"$url\"> Profile </a><br>";        
        return "My User!";
    })->name('user');

});


Route::get('/product', "ProductCtr@index");

Route::get('/product/add/{produto}', "ProductCtr@addProduct");

Route::resource('/client', 'ClientCtr');