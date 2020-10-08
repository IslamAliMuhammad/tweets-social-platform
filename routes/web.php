<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExploreController;
use App\Http\Livewire\Main;
use App\Http\Livewire\Home;

                                    
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
    if(Auth::check()){
        return redirect('home');
    }
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('/home', HomeController::class)->name('home');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('/profiles/{user_name}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::post('/profiles/{user_id}/follows', [FollowController::class, 'store'])->name('follows.store');
    Route::get('/profiles/{user_name}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::patch('/profiles/{user_id}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::get('/explore', ExploreController::class)->name('explore');
});
