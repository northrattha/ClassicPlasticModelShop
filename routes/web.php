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


// login Page
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
Route::get('/login','AutoController@login')->name('login');
Route::post('/postlogin','AutoController@postlogin');

Route::get('/admin', function () {
    return view('admin-shopping');
});


// Admin Register
Route::get('/admin-register', function () {
    return view('admin-register');
})->name('admin-register');
Route::post('/login/addEmp','EmployeeController@create');


// Admin - Sales
Route::get('/admin-shopping', function () {
    return view('admin-shopping');
})->name('admin-shopping');

Route::get('/admin-stock', function () {
    return view('admin-stock');
})->name('admin-stock');

Route::get('/admin-stock-add', function () {
    return view('admin-stock-add');
})->name('admin-stock-add');
Route::post('/admin-stock-add/addProducts','ProductsController@create');
Route::post('/admin-stock-add/updateProducts','ProductsController@update');
Route::post('/admin-stock-add/editProducts','ProductsController@edit');
Route::post('/admin-stock-add/deleteProducts','ProductsController@delete');

Route::get('/admin-stock-edit', function () {
    return view('admin-stock-edit');
})->name('admin-stock-edit');

Route::get('/admin-order', function () {
    return view('admin-order');
})->name('admin-order');

Route::get('/admin-order-add', function () {
    return view('admin-order-add');
})->name('admin-order-add');
Route::post('/admin-order-add/addOrder','OrdersController@create');

Route::get('/admin-order-edit', function () {
    return view('admin-order-edit');
})->name('admin-order-edit');
Route::post('/admin-order-edit/editOrder','OrdersController@update');

Route::get('/admin-order-detail', function () {
    return view('admin-order-detail');
})->name('admin-order-detail');

Route::get('/admin-order-detail-add', function () {
    return view('admin-order-detail-add');
})->name('admin-order-detail-add');
Route::post('/admin-order-detail-add/addOrderdetails','OrdersdetailsController@create');
Route::post('/admin-order-detail-add/addBillingAddress','OrdersdetailsController@addBillingAddress');
Route::post('/admin-order-detail-add/addShippingAddress','OrdersdetailsController@addShippingAddress');

Route::get('/admin-payments', function () {
    return view('admin-payments');
})->name('admin-payments');
Route::post('/admin-payments/addPayments','PaymentsController@create');

Route::get('/admin-member', function () {
    return view('admin-member');
})->name('admin-member');

Route::get('/admin-member-register', function () {
    return view('admin-member-register');
})->name('admin-member-register');
Route::post('/admin-member-register/addMember','memberController@create');

Route::GET('/admin-member-detail/{id}','CustomerController@detail')->name('admin-member-detail');
Route::POST('/admin-member-edit/{id}','CustomerController@edit')->name('admin-member-edit');
Route::POST('/admin-member-Address/{id}','MultiAddressController@create')->name('admin-member-AddAddress');
Route::POST('/admin-member-Address-update/{no}','MultiAddressController@update')->name('admin-member-AddAddress-update');
Route::POST('/admin-member-Address-delete/{no}','MultiAddressController@delete')->name('admin-member-AddAddress-delete');
Route::POST('/admin-member-Address-select/{no}','CustomerController@select')->name('admin-member-AddAddress-select');

// Admin - VP Sales and Sales Manager
Route::get('/admin-ERM', function () {
    return view('admin-ERM');
})->name('admin-ERM');
Route::GET('/admin-ERM-editjob/{id}','EmployeeController@editJob')->name('admin-ERM-editjob');
//Route::GET('/admin-ERM','EmployeeController@index')->name('admin-ERM');
Route::POST('/admin-ERM-addEmployee','EmployeeController@insert')->name('admin-ERM-addEmployee');
Route::GET('/admin-ERM-delete/{id}','EmployeeController@delete')->name('admin-ERM-delete');



// Admin - VP Marketing
Route::get('/admin-marketing', function () {
    return view('admin-marketing');
})->name('admin-marketing');
Route::post('/admin-marketing/addPromotion','PromotionsController@create');

// check-connect to Database
Route::get('check-connect', function () {
    if (DB::connection()->getDatabaseName()) {
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});


// Route::get('/welcome', function () {
//     return view('welcome');
// });