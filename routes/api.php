<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OdometerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerContactController;
use App\Http\Controllers\CustomerNoteController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\PaymentController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('odometer/vehicles', VehicleController::class);
Route::resource('odometer/vehicle.odometers', OdometerController::class);

Route::resource('crm/customers', CustomerController::class);
Route::resource('crm/customer.contacts', CustomerContactController::class);
Route::resource('crm/customer.notes', CustomerNoteController::class);
Route::resource('crm/customer.invoices', InvoiceController::class);
Route::resource('crm/invoice.items', InvoiceItemController::class);
Route::resource('crm/invoice.payments', PaymentController::class);
Route::resource('crm/invoice.deliveries', DeliveryController::class);

Route::get('/user-create', function(Request $request) {
    $user = User::create([
        'name' => 'Steven Woolston', 
        'email' => 'design@woolston.com.au',
        'password' => bcrypt('Password')
    ]);
    // $users = User::get();
    // return $users;
});

Route::get('/login', function() {
    $credentials = request()->only(['email', 'password']);
    $token = auth()->attempt($credentials);
    return $token;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
