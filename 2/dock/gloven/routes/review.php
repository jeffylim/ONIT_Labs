<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Review\ReviewController;

Route::post('/review_add', [ReviewController::class, 'review_add'])->name('review.review_add');
