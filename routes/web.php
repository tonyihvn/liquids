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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index')->name('home');

Route::post('new-subscription', 'SubscriptionsController@store')->name('new-subscription');

Route::get('subscriptions', 'SubscriptionsController@index')->name('subscriptions');

Route::get('addsubscriptions', 'SubscriptionsController@create')->name('addsubscriptions');

Route::get('earnings', 'EarningsController@index')->name('earnings');
Route::get('make-payment/{subid}', 'PaymentsController@makePayment')->name('make-payment');
Route::post('save-payment', 'PaymentsController@store')->name('save-payment');
Route::get('online-payment/{subid}/{payresponse}', 'PaymentsController@onlinePayment')->name('online-payment');
