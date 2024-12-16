<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\PreventRegisterAccess;
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
Route::middleware('auth')->group(function(){
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

    Route::get('/customer/{key}', [\App\Http\Controllers\CustomerController::class,'order'])->name('c.order');
    Route::post('/customer/{key}', [\App\Http\Controllers\CustomerController::class,'submit'])->name('c.submit');
    Route::get('/customer/{key}/created', [\App\Http\Controllers\CustomerController::class,'confirm'])->name('c.confirm');
    Route::get('/customer/{key}/search', [\App\Http\Controllers\CustomerController::class,'scout'])->name('c.scout');


    Route::get('/customer/{key}/bill_of_lading', [\App\Http\Controllers\CustomerController::class,'bl'])->name('c.bl');
    Route::get('/customer/{key}/BL', [\App\Http\Controllers\CustomerController::class, 'showBL'])->name('c.parcels');
    Route::get('/customer/BL/{key}', [\App\Http\Controllers\CustomerController::class, 'audit'])->name('c.audit');
    Route::get('/customer/BL/{key}/search', [\App\Http\Controllers\CustomerController::class, 'find'])->name('c.find');
    Route::post('/BL/update/{key}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('c.update');

    //List
    Route::get('/priceList', [\App\Http\Controllers\listController::class,'index'])->name('price');
    Route::post('/priceList/create', [\App\Http\Controllers\listController::class,'create'])->name('p.create');
    Route::get('/priceList/create', [\App\Http\Controllers\listController::class,'edit'])->name('p.edit');
    Route::post('/priceList/category', [\App\Http\Controllers\listController::class,'category'])->name('p.cat');
    Route::post('/priceList/update', [\App\Http\Controllers\listController::class,'update'])->name('p.update');
    Route::get('/priceList/delete', [\App\Http\Controllers\listController::class,'delete'])->name('p.delete');
    Route::get('/priceList/submit-order', [\App\Http\Controllers\listController::class,'submitOrder'])->name('order.submit');
    Route::get('/priceList/search', [\App\Http\Controllers\listController::class,'search'])->name('l.search');

    Route::post('/priceList/addCategory', [\App\Http\Controllers\listController::class, 'addCategory'])->name('p.add');
    Route::post('/priceList/updateCategory', [\App\Http\Controllers\listController::class, 'updateCategory'])->name('p.upd');
    Route::post('/priceList/deleteCategory', [\App\Http\Controllers\listController::class, 'deleteCategory'])->name('p.del');


    //Staffs
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('users/create', [\App\Http\Controllers\staffControl::class, 'create'])->name('u.create');
    Route::post('users/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('u.edit');
    Route::post('users/delete', [\App\Http\Controllers\UserController::class, 'delete'])->name('u.delete');
    Route::get('/users/search',  [\App\Http\Controllers\UserController::class, 'search'])->name('u.search');
    Route::post('users/reset', [\App\Http\Controllers\UserController::class, 'reset'])->name('u.reset');

    //Parcel View
    Route::get('/parcel/search', [\App\Http\Controllers\ParcelController::class, 'search'])->name('p.search');
    Route::get('/parcel/qr/{key}', [\App\Http\Controllers\ParcelController::class, 'qr'])->name('p.qr');
    Route::get('/parcel/bl/{key}', [\App\Http\Controllers\ParcelController::class, 'bl'])->name('p.bl');
    Route::get('/parcel/blnew/{key}', [\App\Http\Controllers\ParcelController::class, 'blnew'])->name('p.blnew');

    Route::get('/orders', [\App\Http\Controllers\ParcelController::class, 'index'])->name('p.view');
    Route::get('/orders/ship_{shipNum}', [\App\Http\Controllers\ParcelController::class, 'showShip'])->name('parcels.showShip');
    Route::get('/orders/ship_{shipNum}/voyage_{voyageNum}/dock_{dock}', [\App\Http\Controllers\ParcelController::class, 'showVoyage'])->name('parcels.showVoyage');

    Route::put('/order/ship_{shipNum}/voyage_{voyageNum}/{orderId}/update-status/', [\App\Http\Controllers\ParcelController::class, 'updateStatus'])->name('parcels.updateStatus');




    //Profile Update
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //SHIP AND VOYAge
    Route::post('ship/create', [\App\Http\Controllers\shipController::class, 'create'])->name('s.create');
    Route::post('ship/delete', [\App\Http\Controllers\shipController::class, 'delete'])->name('s.error');
    Route::post('ship/update/{shipId}', [\App\Http\Controllers\shipController::class, 'update'])->name('s.update');

    //OR AR NUMBER
    Route::post('/order/ship_{shipNum}/voyage_{voyageNum}/{orderId}/update/OR', [\App\Http\Controllers\shipController::class, 'OR'])->name('s.or');
    Route::post('/order/ship_{shipNum}/voyage_{voyageNum}/{orderId}/update/AR', [\App\Http\Controllers\shipController::class, 'AR'])->name('s.ar');
    Route::post('/order/{key}/{orderId}/update/AR', [\App\Http\Controllers\CustomerController::class, 'AR'])->name('c.ar');
    Route::post('/order/{key}/{orderId}/update/OR', [\App\Http\Controllers\CustomerController::class, 'OR'])->name('c.or');


});

Auth::routes();
//Route::get('/test', [\App\Http\Controllers\ProfileController::class, 'test'])->name('test.show'); bl testing
Route::middleware([PreventRegisterAccess::class])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::middleware('auth')->group(function () {
Route::post('/data', 'DataController@store')->name('data.store');

});


