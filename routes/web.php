<?php

use App\Http\Controllers\admin\rentbooking;
use App\Http\Controllers\admin\rentbookingController;
use App\Http\Controllers\admin\SalevehicalController;
use App\Http\Controllers\RentCarController;
use App\Models\RentCar;
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

Route::get('/', function () {
    return view('admin\layout');
});

Route::resources(['salevehical' => SalevehicalController::class]);
Route::get('bookcarpage', 'App\Http\Controllers\admin\SalevehicalController@bookedcarss')->name('bookedcars');
Route::get('soldcarspage', 'App\Http\Controllers\admin\SalevehicalController@soldcars')->name('soldcaars');

Route::get('delbookcar/{id}', 'App\Http\Controllers\admin\SalevehicalController@delbookcar')->name('delbookcar');
Route::post('delivercar', 'App\Http\Controllers\admin\SalevehicalController@delivercar')->name('delivercar');
Route::get('delsoldcar/{id}', 'App\Http\Controllers\admin\SalevehicalController@delsoldcar')->name('delsoldcar');

Route::resources(['rentcar' => RentCarController::class]);
Route::resources(['maketrip' => rentbookingController::class]);
Route::get('rentbooking', 'App\Http\Controllers\admin\rentbookingController@confirmbooking')->name('confirmrentbooking');
// Route::get('rentbooking/{id}','App\Http\Controllers\admin\rentbookingController@destroy')->name('rentbooking');

//.........................................Site......................................................................//

Route::get('/index', function () {
    return view('site.index');
})->name('home');
//..........Car for Sale ..........//
Route::get('bookcar/{id}', 'App\Http\Controllers\site\SalecarController@bookcar')->name('bookcar');
Route::post('bokedcar', 'App\Http\Controllers\SaleCarController@bookedcar')->name('bookedcar');
Route::get('cardetails/{id}', 'App\Http\Controllers\site\SalecarController@salecardetails')->name('cardetails');

Route::get('/cardetails', function () {
    return view('site.cardetails');
});
//..........car for rent.......//
Route::post('rentcarbooking', 'App\Http\Controllers\websitecontroller@rentcarbooking')->name('rentcarbooking');

Route::get('bookridepage/{id}', 'App\Http\Controllers\websitecontroller@bookridepage')->name('bookridepage');
Route::any('searchrentalcar', 'App\Http\Controllers\site\SearchController@searchrentalcar')->name('searchrentalcar');
Route::get('searchpage', 'App\Http\Controllers\site\SearchController@searchpage')->name('searchpage');

Route::get('registerdriver', function () {
    return view('site.registerdriver');
});

Route::post('registerdriver', 'App\Http\Controllers\websitecontroller@registerdriver')->name('registerdriver');

Route::get('/login', function () {
    return view('site.login');
})->name('login');

Route::post('/auth', 'App\Http\Controllers\DriverController\AuthController@authentication')->name('authentication');

Route::get('driverprofile', function () {
        return view('site.driverpanel');
    })->name('driverprofile')->middleware('auth:driver');
Route::get('driver/logout','App\Http\Controllers\DriverController\AuthController@logout')->name('logout')->middleware('auth:driver');
Route::view('/contacus', 'site.contact')->name('contactus');
Route::get('/salecarpage','App\Http\Controllers\site\SalecarController@salecarpage')->name('salecarpage');

// Route::resource('salecar','App\Http\Controllers\site\SalecarController');
