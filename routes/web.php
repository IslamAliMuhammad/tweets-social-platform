<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExploreController;
use App\Http\Livewire\Main;
use App\Http\Livewire\Home;
use App\Http\Controllers\LikeController;

use App\Http\Livewire\HomeComp;
use App\Http\Livewire\ProfileComp;
use App\Http\Livewire\ExploreComp;
use App\Http\Livewire\EditProfileComp;
use App\Http\Livewire\TweetInputComp;
use App\Http\Livewire\BookmarksComp;






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
    Route::get('/home', HomeComp::class)->name('home');    
    Route::post('/tweets', TweetInputComp::class)->name('tweets.store');
    Route::get('/profiles/{user:user_name}', ProfileComp::class)->name('profiles.show');
    Route::get('/profiles/{user:user_name}/edit', EditProfileComp::class)->name('profiles.edit');
    Route::patch('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::get('/explore', ExploreComp::class)->name('explore');
    Route::get('/bookmarks', BookmarksComp::class)->name('bookmarks');    
});

