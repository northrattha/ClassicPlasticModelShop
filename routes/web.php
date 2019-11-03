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
// Home Page
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/index', function () {
    return view('index');
})->name('index');


// Admin Home Page
Route::get('/admin', function () {
    return view('admin-shopping');
});


// Admin - Sales
Route::get('/admin-shopping', function () {
    return view('admin-shopping');
})->name('admin-shopping');

Route::get('/admin-stock', function () {
    return view('admin-stock');
})->name('admin-stock');

Route::get('/admin-order', function () {
    return view('admin-order');
})->name('admin-order');

Route::get('/admin-member', function () {
    return view('admin-member');
})->name('admin-member');

Route::get('/admin-member-register', function () {
    return view('admin-member-register');
})->name('admin-member-register');


// Admin - VP Sales and Sales Manager
Route::get('/admin-ERM', function () {
    return view('admin-ERM');
})->name('admin-ERM');


// Admin - VP Marketing
Route::get('/admin-marketing', function () {
    return view('admin-marketing');
})->name('admin-marketing');


Route::get('/login', function () {
    return view('login');
})->name('login');


// check-connect to Database
Route::get('check-connect', function () {
    if (DB::connection()->getDatabaseName()) {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');