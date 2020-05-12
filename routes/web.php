<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/donate', function () {
    return view('donate');
});

Route::post('/donate', function (Request $request) {
    $charge = Stripe::charges()->create([
        'source' => $request->stripeToken,
        'currency' => 'USD',
        'amount'   => $request->donationAmount,
    ]);

    return back()->with('message', 'Thank you! Your payment was successful.');
});