<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'reset' => false,
    'verify' => false,
    'password-reset' => false,
    'password.reset' =>false,
    'register' => false,
]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/Casher', [App\Http\Controllers\HomeController::class, 'cashir'])->name('cashir');
Route::post('/Casher', [App\Http\Controllers\HomeController::class, 'addcashir'])->name('addcashir');


Route::get('/Supplier', [App\Http\Controllers\HomeController::class, 'supplier'])->name('supplier');
Route::get('/Supplier/{status}/{id}', [App\Http\Controllers\HomeController::class, 'addsupplier'])->name('addsupplier');
Route::POST('/Supplier/{status}/{id}', [App\Http\Controllers\HomeController::class, 'addsupplier'])->name('addsupplier');
// aw cashera nawy batnakaya
// Route::get('/pass', function () { bp hash krdni password
//     return Hash::make('2002');
// });

//by page

Route::get('/Buy', [App\Http\Controllers\HomeController::class, 'buy'])->name('buy');
Route::get('/Buy/{status}/{id}', [App\Http\Controllers\HomeController::class, 'add_buy'])->name('add_buy');
Route::post('/Buy/{status}/{id}', [App\Http\Controllers\HomeController::class, 'add_buy'])->name('add_buy');


//not left 

Route::get('/NotLeft', [App\Http\Controllers\HomeController::class, 'NotLeft'])->name('NotLeft');

//debt list

Route::get('/DebtList', [App\Http\Controllers\HomeController::class, 'DebtList'])->name('DebtList');
   

//expire  page

Route::get('/Expire', [App\Http\Controllers\HomeController::class, 'Expire'])->name('Expire');

//saller
Route::get('/Saller', [App\Http\Controllers\HomeController::class, 'Saller'])->name('Saller');


//sale page
Route::get('/Sale' ,  [App\Http\Controllers\HomeController::class, 'sale'])->name('sale');
Route::Post('/Sale' ,  [App\Http\Controllers\HomeController::class, 'get_sale'])->name('sale');


Route::Post('viewtb' ,  [App\Http\Controllers\HomeController::class, 'viewtb'])->name('viewtb');


//undo 

Route::Post('undo' ,  [App\Http\Controllers\HomeController::class, 'undo'])->name('undo');




//wasl
Route::Post('wasl' ,  [App\Http\Controllers\HomeController::class, 'wasl'])->name('wasl');


//clean 
Route::get('clean' ,  [App\Http\Controllers\HomeController::class, 'clean'])->name('clean');
