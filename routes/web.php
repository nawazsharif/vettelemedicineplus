<?php

use App\Role;
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

Route::get('/', 'HomeController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('register/doctor', 'UserController@registerDoctor')->name('home');
Route::get('service/{id}', 'HomeController@serviceDetails');
Route::post('bkash-confirmation', 'HomeController@bkashConfirmation');
Route::get('service/doctor/{id}', 'HomeController@doctorDetails');
Route::group(['middleware' => ['auth']], function () {
    Route::get('categories', 'CategoryController@categories');
    Route::get('confirm/patients', 'HomeController@allPatients');
    Route::get('reject/patients', 'HomeController@allRejectPatients');
    Route::get('pending/patients', 'HomeController@allPendingPatients');
    Route::post('payment-status/{id}', 'HomeController@paymentStatus');
    Route::get('payment', 'HomeController@payment');
    Route::get('doctor-list', 'AccountController@doctorList');
    Route::match(['get', 'post'], 'add-edit-doctor/{id}', 'UserController@addEditDoctor');
    Route::get('pending-doctor-list', 'AccountController@pendingDoctorList');
    Route::get('delete-category/{id}', 'CategoryController@deleteCategories');
    Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
});