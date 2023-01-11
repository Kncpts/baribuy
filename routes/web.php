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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/', 'LandingController@index')->name('home');



Route::get('/home', 'HomeController@index')->middleware(['web', 'auth', '2fa']);
Route::get('/listings', 'frontend\ListingController@index')->name('listings');
Route::get('/learn', 'frontend\PageController@learn')->name('learn');
Route::get('/about', 'frontend\PageController@about')->name('about');
Route::get('/contact-us', 'frontend\PageController@contactUs')->name('contact-us');
Route::get('/signup', 'frontend\PageController@signup')->name('signup');
Route::get('/basic-info', 'frontend\PageController@basicInfo')->name('basic-info');
Route::post('/basic-info', 'frontend\PageController@basicInfo')->name('basic-info');
Route::get('/account', 'frontend\PageController@account')->name('account');
Route::post('/account', 'frontend\PageController@account')->name('account');

Route::get('/account-input', 'frontend\PageController@accountInput')->name('account-input');
Route::post('/account-input', 'frontend\PageController@accountInput')->name('account-input');

Route::post('/emailverify', 'frontend\PageController@emailverify')->name('emailverify');
Route::get('/emailverify', 'frontend\PageController@emailverify')->name('emailverify');

Route::post('/resetpassword', 'frontend\PageController@resetpassowrd')->name('reset-password');
Route::get('/resetpassword', 'frontend\PageController@resetpassowrd')->name('reset-password');

Route::post('/identityverify', 'frontend\PageController@identityverify')->name('identityverify');
Route::get('/identityverify', 'frontend\PageController@identityverify')->name('identityverify');


Route::get('/setFavourite/{id}', 'PropertyController@setFavourite')->name('setFavourite');
Route::get('/unsetFavourite/{id}', 'PropertyController@unsetFavourite')->name('unsetFavourite');

// 2 fector authentication
Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', 'isAdmin']], function () {
   

    Route::get('/admin-panel', 'AdminController@index')->name('admin.dashboard');
    Route::get('/users', 'UsersController@index')->name('admin.users');
    Route::get('/user/create', 'UsersController@create')->name('admin.user.create');
    Route::post('/user/store', 'UsersController@store')->name('admin.user.store');
    Route::get('/user/edit/{id}', 'UsersController@edit')->name('admin.user.edit');
    Route::get('/user/{id}', 'UsersController@show')->name('admin.user');
    Route::put('/user/{id}', 'UsersController@update')->name('admin.user.update');
    Route::delete('/user/{id}', 'UsersController@destroy')->name('admin.user.delete');

    Route::get('/properties', 'PropertyController@index')->name('admin.properties');
    Route::get('/property/add', 'PropertyController@add')->name('admin.property.add');
    Route::post('/property/store', 'PropertyController@store')->name('admin.property.store');
    Route::post('/property/file', 'PropertyController@fileStore')->name('admin.property.file');
    Route::post('/property/docfile', 'PropertyController@docFileStore')->name('admin.property.docfile');
    Route::get('/display_pdf/{filename}','PdfController@index')->name('admin.display_pdf');
    Route::get('/property/edit/{id}', 'PropertyController@add')->name('admin.property.edit');
    Route::post('/property/update/{id}', 'PropertyController@store')->name('admin.property.update');
    Route::delete('/property/delete/{id}', 'PropertyController@destroy')->name('admin.property.delete');


    Route::get('/roles', 'RolesController@index')->name('admin.roles');
    Route::get('/role', 'RolesController@show')->name('admin.role');
});



Route::group(
    ['prefix' => 'profile', 'middleware' => ['auth:web']],
    function () {
        Route::get('/', 'ProfileController@show')->name('user.profile');
        Route::get('/edit', 'ProfileController@edit')->name('user.profile.edit');
        Route::post('/profile', 'ProfileController@update')->name('user.profile.update');
        Route::post('/photo', 'ProfileController@uploadProfile')->name('profile.photo');
        // 
        
    
      
    }
);

Route::group(
    ['prefix' => 'document', 'middleware' => ['auth:web', '2fa']],
    function () {
        Route::post('/upload', 'UserDocumentController@upload')->name('user.document');
        Route::get('/destroy/{id}', 'UserDocumentController@destroy')->name('user.destroy');
    }
);

Route::group(
    ['prefix' => 'fund', 'middleware' => ['auth:web', '2fa']],
    function () {
        Route::post('/add', 'FundController@add')->name('user.add.fund');
    }
);

Route::post('/register/customer', 'CustomerController@registerCustomer')->name('customer.register');
Route::get('/validate/customer/email', 'CustomerController@validateEmail')->name('customer.validate.email');
    
