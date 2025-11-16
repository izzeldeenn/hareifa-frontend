<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return view('index');
})->name('home');

// Academies
Route::prefix('academies')->group(function () {
    Route::get('/', 'App\Http\Controllers\AcademyController@index')->name('academies.index');
    Route::get('/{id}', 'App\Http\Controllers\AcademyController@show')->name('academies.show');
});

// Players
Route::prefix('players')->group(function () {
    Route::get('/', 'App\Http\Controllers\PlayerController@index')->name('players.index');
    Route::get('/{id}', 'App\Http\Controllers\PlayerController@show')->name('players.show');
});

// Videos
Route::prefix('videos')->group(function () {
    Route::get('/', 'App\Http\Controllers\VideoController@index')->name('videos.index');
    Route::get('/{id}', 'App\Http\Controllers\VideoController@show')->name('videos.show');
    Route::get('/upload', 'App\Http\Controllers\VideoController@create')->name('videos.create');
    Route::post('/', 'App\Http\Controllers\VideoController@store')->name('videos.store');
});

// Matches
Route::prefix('matches')->group(function () {
    Route::get('/', 'App\Http\Controllers\MatchController@index')->name('matches.index');
    Route::get('/{id}', 'App\Http\Controllers\MatchController@show')->name('matches.show');
});

// Authentication
Route::middleware(['guest'])->group(function () {
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
    Route::get('/signup', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('signup');
    Route::post('/signup', 'App\Http\Controllers\Auth\RegisterController@register');
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    
    // User Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
        Route::put('/', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
        Route::put('/password', 'App\Http\Controllers\ProfileController@updatePassword')->name('profile.password');
    });
    
});

// News
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', 'App\Http\Controllers\NewsController@index')->name('index');
    Route::get('/{id}', 'App\Http\Controllers\NewsController@show')->name('show');
});

// Static Pages
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');
