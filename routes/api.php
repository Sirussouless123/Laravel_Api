<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group( static function () : void {
    Route::get('/user', function (Request $request) {
        return $request->user();
});

Route::prefix('invoices')->as('invoices.')->group( static function (): void {
   Route::get('/',[InvoiceController::class,'index'])->name('index');
   Route::post('/store',[InvoiceController::class,'store'])->name('store');
});

});

// Route::get( 
//     uri : 'login',
//      action: static fn ()=>App\Models\User::firstOrFail()->createToken( name : 'auth_token')->plainTextToken,
//      )->name('login');


