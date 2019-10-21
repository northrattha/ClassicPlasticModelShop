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
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/connect', function () {
    return view('connect');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/Ordering', function () {
    return view('Ordering');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/setting', function () {
    return view('setting');
});
