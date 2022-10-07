<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Autentication\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Subsidiary\SubsidiaryController;
use App\Http\Controllers\Vendor\VendorController;

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

Route::prefix('v1')->group(function () {
    /* router guest auth */
    Route::prefix('auth')->group(function () {
        // login
        Route::post('login', [LoginController::class, 'authenticate']);
    });

    // routes autenticades
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('me', [LoginController::class, 'getAuthenticatedUser']);
        Route::post('logout', [LoginController::class, 'logout']);
        // providers
        Route::get('providers', [ProviderController::class, 'index']);

        //vendors
        Route::get('vendors', [VendorController::class, 'index']);

        //clients
        Route::get('clients', [ClientController::class, 'index']);
        Route::post('clients', [ClientController::class, 'store']);
        Route::put('client/{id}', [ClientController::class, 'update']);


        // products
        Route::get('products', [ProductController::class, 'index']);

        // subsidiaries
        Route::get('subsidiaries', [SubsidiaryController::class, 'index']);
    
        //sales
        Route::get('sales', [SaleController::class, 'index']);
        Route::post('sales', [SaleController::class, 'store']);

    });
});
