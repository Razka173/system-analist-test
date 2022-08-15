<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Invoice;
use App\Models\Product;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\InvoiceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/products', [ProductController::class, 'index']);
Route::get('/v1/products/{id?}', [ProductController::class, 'show']);
Route::post('/v1/products/store', [ProductController::class, 'store']);
Route::post('/v1/products/update', [ProductController::class, 'update']);
Route::delete('/v1/products/delete/{id?}', [ProductController::class, 'destroy']);


Route::get('/v1/invoices', [InvoiceController::class, 'index']);
Route::get('/v1/invoices/{id?}', [InvoiceController::class, 'show']);
Route::post('/v1/invoices/store', [InvoiceController::class, 'store']);
Route::post('/v1/invoices/update', [InvoiceController::class, 'update']);
Route::delete('/v1/invoices/delete/{id?}', [InvoiceController::class, 'destroy']);
