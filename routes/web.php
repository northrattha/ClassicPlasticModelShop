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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/add', function () {
    return view('add');
})->name('add');

Route::get('/connect', function () {
    return view('connect');
})->name('connect');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/ordering', function () {
    return view('ordering');
})->name('ordering');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/setting', function () {
    return view('setting');
})->name('setting');
