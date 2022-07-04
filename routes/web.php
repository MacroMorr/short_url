<?php

use App\Http\Controllers\ShortController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    $shortURL = DB::table('short_urls')->orderBy('added_on', 'desc')->limit(10)->get();
    return view('home', ['short_urls' => $shortURL]);
});

Route::get('/{short_url}', [ShortController::class, 'checkShortUrl']);
Route::post('/short', [ShortController::class, 'createShortUrl']);
