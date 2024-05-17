<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    $links = \App\Models\Link::all();
    // dynamic method to name the variable
    return view('welcome')->withLinks($links);
});

// submit links into the database
Route::get('/', function () {
    return view('submit');
});

//reset password
Route::post('/password.email', function($password){
    return $password;
});

// POST request for submitting the form
Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);
 
    $link = tap(new App\Models\Link($data))->save();
 
    return redirect('/');
});
 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
