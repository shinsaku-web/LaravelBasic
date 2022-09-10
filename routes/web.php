<?php

use App\Http\Controllers\Sample\IndexController;
use App\Http\Controllers\Tweet\IndexController as TweetIndexController;
use App\Http\Controllers\Tweet\CreateController as TweetCreateController;
use App\Http\Controllers\Tweet\Update\IndexController as TweetUpdateIndexController;
use App\Http\Controllers\Tweet\Update\PutController as TweetUpdatePutController;
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

Route::get('/', [IndexController::class, 'show']);
Route::get('/sample/{id}', [IndexController::class, 'showId']);
Route::get('/tweet', TweetIndexController::class)->name('tweet.index');
Route::post('/tweet/create', TweetCreateController::class)->name('tweet.create');
Route::get('/tweet/update/{tweetId}', TweetUpdateIndexController::class)->name('tweet.update.index')->where('tweetId', '[0-9]+');
Route::put('/tweet/update/{tweetId}', TweetUpdatePutController::class)->name('tweet.update.put')->where('tweetId', '[0-9]+');
