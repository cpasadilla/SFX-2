<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});
Route::prefix('staff')->middleware(['auth', 'isStaff'])->group(function(){

    //Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //BL
    Route::get('/bl', [\App\Http\Controllers\BLControllers::class,'index'])->name('bl');

    //Customer Details
    Route::get('/customer', [\App\Http\Controllers\CustomerController::class,'index'])->name('customer');
    Route::post('/customer/create', [\App\Http\Controllers\CustomerController::class,'create'])->name('c.create');
    Route::post('/customer/edit', [\App\Http\Controllers\CustomerController::class,'edit'])->name('c.edit');
    Route::post('/customer/delete', [\App\Http\Controllers\CustomerController::class,'delete'])->name('c.error');
    Route::get('/customer/search',  [\App\Http\Controllers\CustomerController::class, 'search'])->name('c.search');
    Route::post('/customer/reset', [\App\Http\Controllers\CustomerController::class,'reset'])->name('c.reset');

    Route::get('/customer/{key}', [\App\Http\Controllers\CustomerController::class,'order'])->name('c.order');
    Route::post('/customer/{key}', [\App\Http\Controllers\CustomerController::class,'submit'])->name('c.submit');
    Route::get('/customer/{key}/created', [\App\Http\Controllers\CustomerController::class,'confirm'])->name('c.confirm');
    Route::get('/customer/{key}/bill_of_lading', [\App\Http\Controllers\CustomerController::class,'bl'])->name('c.bl');
    
    //List
    Route::get('/priceList', [\App\Http\Controllers\listController::class,'index'])->name('price');
    Route::post('/priceList/create', [\App\Http\Controllers\listController::class,'create'])->name('p.create');
    Route::get('/priceList/create', [\App\Http\Controllers\listController::class,'edit'])->name('p.edit');
    Route::post('/priceList/category', [\App\Http\Controllers\listController::class,'category'])->name('p.cat');
    Route::post('/priceList/update', [\App\Http\Controllers\listController::class,'update'])->name('p.update');
    Route::get('/priceList/delete', [\App\Http\Controllers\listController::class,'delete'])->name('p.delete');
        Route::get('/priceList/submit-order', [\App\Http\Controllers\listController::class,'submitOrder'])->name('order.submit');
    Route::get('/priceList/search', [\App\Http\Controllers\listController::class,'search'])->name('l.search');

    //Staffs
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [\App\Http\Controllers\staffControl::class, 'index'])->name('u.create');
    Route::post('users/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('u.edit');
    Route::post('users/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('u.delete');
    Route::get('/users/search',  [\App\Http\Controllers\UserController::class, 'search'])->name('u.search');
    Route::post('users/reset', [\App\Http\Controllers\UserController::class, 'reset'])->name('u.reset');

    //Parcel View
    //Route::get('/orders', [\App\Http\Controllers\ParcelController::class, 'index'])->name('p.view');
    //Route::get('/orders/QR/{key}', [\App\Http\Controllers\ParcelController::class, 'confirm'])->name('p.qr');
    //Route::get('/orders/BL/{key}', [\App\Http\Controllers\ParcelController::class, 'bl'])->name('p.bl');
    //Route::get('/orders/search',  [\App\Http\Controllers\ParcelController::class, 'search'])->name('p.search');
    Route::get('/parcel/search', [\App\Http\Controllers\ParcelController::class, 'search'])->name('p.search');
    Route::get('/parcel/qr/{key}', [\App\Http\Controllers\ParcelController::class, 'qr'])->name('p.qr');
    Route::get('/parcel/bl/{key}', [\App\Http\Controllers\ParcelController::class, 'bl'])->name('p.bl');


    //Route::get('/orders/{shipNum}/{voyageNum}', [\App\Http\Controllers\ParcelController::class, 'showOrdersByShipAndVoyage'])->name('orders.byShipAndVoyage');
    Route::get('/orders', [\App\Http\Controllers\ParcelController::class, 'index'])->name('p.view');
    Route::get('/orders/{shipNum}', [\App\Http\Controllers\ParcelController::class, 'showShip'])->name('parcels.showShip');
    Route::get('/orders/{shipNum}/{voyageNum}', [\App\Http\Controllers\ParcelController::class, 'showVoyage'])->name('parcels.showVoyage');
    

    //Route::get('/orders/bl/{orderId}', [\App\Http\Controllers\ParcelController::class, 'bl'])->name('p.bl');
    //Route::get('/orders/{shipNum}/{voyageNum}/bl/{orderId}', [\App\Http\Controllers\ParcelController::class, 'bl'])->name('p.bl');


    //ORDERS UPDATE
    Route::get('/shipping', [\App\Http\Controllers\shipController::class, 'index'])->name('o.view');
    Route::get('/shipping/scan/{key}',  [\App\Http\Controllers\shipController::class,'scanned'])->name('o.scan');
    Route::get('/shipping/scan',  [\App\Http\Controllers\shipController::class,'scan'])->name('scan');

    Route::get('/shipping/update', [\App\Http\Controllers\shipController::class, 'pick'])->name('o.pick');
    Route::get('/shipping/update/receive', [\App\Http\Controllers\shipController::class, 'update'])->name('o.update');
    Route::post('/shipping/update/order', [\App\Http\Controllers\shipController::class,'ship'])->name('o.ship');

    //CARGO WEIGHT
    Route::get('/shipping/weight', [\App\Http\Controllers\shipController::class, 'weight'])->name('o.weight');
    Route::post('/shipping/weight/create', [\App\Http\Controllers\shipController::class, 'submit'])->name('o.submit');
    //CARGO TABLE
    Route::get('/shipping/table', [\App\Http\Controllers\shipController::class, 'table'])->name('o.table');
    Route::get('/shipping/table/{key}', [\App\Http\Controllers\shipController::class, 'qr'])->name('o.qr');



    //Profile Update
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    
});

Auth::routes();

Route::get('/home',[App\Http\Controllers\InfoController::class, 'index'])->name('cust');
Route::get('/home/billOfLading/{key}',[App\Http\Controllers\InfoController::class, 'bl'])->name('cust.bl');
Route::put('/home/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('cust.update');
Route::middleware('auth')->group(function () {
Route::post('/data', 'DataController@store')->name('data.store');

});

