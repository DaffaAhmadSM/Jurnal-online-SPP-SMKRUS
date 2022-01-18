<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\InvoiceController;

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
   Route::get('/export', [UploadController::class, 'export'])->name('exportexcel');
});

// Route::resource('invoice', LoginController::class);

//public route
Route::post('/login', [LoginController::class, 'store']);

