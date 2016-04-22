<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return redirect('/home');
//});
Route::get('/', 'Home@index');
Route::get('/home', 'Home@index');


Route::get('/member', 'MemberController@index');
Route::get('/member/my-profil', function () {
    return view('my-profil');
});

//Route::get('/member/my-scholarship', function () {
//    return view('my-scholarship');
//});
Route::get('/member/my-scholarship', 'ScholarshipController@myScholarship');

Route::get('/member/my-donation', function () {
    return view('my-donation');
});

Route::get('/member/my-kredit', function () {
    return view('my-kredit');
});

Route::get('/member/locate', function () {
    return view('locate');
});

Route::get('/member/bank', function () {
    return view('bank');
});

Route::get('/member/admin-donation', function () {
    return view('donation');
});

Route::post('/member/updatePhoto', 'MemberController@updatePhoto');
Route::put('/member/updatePassword/{id}', 'MemberController@updatePassword');
Route::get('/member/passwordValidator', 'MemberController@passwordValidator');
Route::get('/member/emailValidator', 'MemberController@emailValidator');
Route::post('/member/forgetPassword', 'MemberController@forgetPassword');
Route::post('/member/login', 'MemberController@login');
Route::get('/member/logout', 'MemberController@logout');
Route::get('/member/error', 'MemberController@error');
//Route::get('/member/profil/{id}', 'MemberController@profil');
Route::get('/profil/{id}', 'MemberController@profil');

Route::get('/scholarship/detail/{id}', 'ScholarshipController@detail');
Route::get('/scholarship-detail/{id}', 'ScholarshipController@detail');
Route::get('/scholarship/getThree', 'ScholarshipController@getThree');
Route::get('/scholarship/homeScholarship', 'ScholarshipController@homeScholarship');
Route::get('/scholarship/allScholarship', 'ScholarshipController@allScholarship');
Route::get('/scholarship/allScholarshipJson', 'ScholarshipController@allScholarshipJson');


Route::put('/transaction/confirm/{id}', 'TransactionController@confirm');
Route::get('/transaction/delete/{id}', 'TransactionController@delete');

Route::get('/locate/getAllRowsForScholarship', 'LocateController@getAllRowsForScholarship');

Route::get('/donation-detail/{id}', 'DonationController@detail');

Route::group(['middlewareGroups' => ['web']], function(){
    Route::resource('member', 'MemberController');
    Route::resource('locate', 'LocateController');
    Route::resource('bank', 'BankController');
    Route::resource('scholarship', 'ScholarshipController');
    Route::resource('ScholarshipVariable', 'ScholarshipVariableController');
    Route::resource('transaction', 'TransactionController');
    Route::resource('donation', 'DonationController');
    Route::resource('confirmation', 'ConfirmationController');
    Route::resource('credit', 'CreditController');
});