<?php
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
   Route::post('/logout', [LoginController::class, 'logout']);
   Route::get('/invoice', [InvoiceController::class, 'index']);
});

// Route::resource('invoice', LoginController::class);

//public route
Route::post('/login', [LoginController::class, 'store']);

