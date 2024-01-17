<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\AsdController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

require_once(__DIR__ . '/auth.php');

require_once(__DIR__ . '/catalog.php');

require_once(__DIR__ . '/bid.php');

require_once(__DIR__ . '/review.php');

Route::redirect('/index', '/');

Route::get('/account', function (){
    return view('account', ['pageName'=>'acc']);
})->name('account');

Route::get('/{page}', [StaticPageController::class, 'show'])->name('static_page');


