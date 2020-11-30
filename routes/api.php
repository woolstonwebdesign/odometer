<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OdometerController;
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

Route::resource('vehicles', VehicleController::class);
Route::resource('vehicle.odometers', OdometerController::class);

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
