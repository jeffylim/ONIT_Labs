<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bid\BidController;

Route::post('/bid_add', [BidController::class, 'bid_add'])->name('bid.bid_add');

Route::middleware('auth', 'permission:manager')->group(function(){
    Route::get('/bid', [BidController::class, 'bid'])->name('bid.bid');

    Route::get('/bid_delete/{id}', [BidController::class, 'bid_delete'])->name('bid.bid_delete');

    Route::get('/bid_download/{id}', [BidController::class, 'download_file'])->name('bid.download_file');
});


