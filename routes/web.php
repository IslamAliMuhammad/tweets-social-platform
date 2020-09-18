<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('profiles/{id}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::post('profiles/{id}/follows', [FollowController::class, 'store'])->name('follows.store');
    Route::get('profiles/{id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
});
