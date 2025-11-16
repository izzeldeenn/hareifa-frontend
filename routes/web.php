<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return view('index');
})->name('home');


//donations
Route::prefix('donations')->group(function () {
    Route::get('/' , function () {
        return view('donations.index');
    })->name('donations.index');
    Route::get('/{id}', function () {
        return view('donations.show');
    })->name('donations.show');
});

//league
Route::prefix('leagues')->group(function () {
    Route::get('/', function () {
        return view('leagues.index');
    })->name('leagues.index');
    Route::get('/{id}', function () {
        return view('leagues.show');
    })->name('leagues.show');
});

//teams
Route::prefix('teams')->group(function () {
    Route::get('/', function () {
        return view('teams.index');
    })->name('teams.index');
    Route::get('/{id}', function () {
        return view('teams.show');
    })->name('teams.show');
});

// clubs
Route::prefix('clubs')->group(function () {
    Route::get('/', function () {
        return view('clubs.index');
    })->name('clubs.index');
    Route::get('/{id}', function () {
        return view('clubs.show');
    })->name('clubs.show');
});

// Academies
Route::prefix('academies')->group(function () {
    Route::get('/', function () {
        return view('academies.index');
    })->name('academies.index');
    Route::get('/{id}', function () {
        return view('academies.show');
    })->name('academies.show');
});

// Players
Route::prefix('players')->group(function () {
    Route::get('/', function () {
        return view('players.index');
    })->name('players.index');
    Route::get('/{id}', function () {
        return view('players.show');
    })->name('players.show');
});

// Videos
Route::prefix('videos')->group(function () {
    Route::get('/', function () {
        return view('videos.index');
    })->name('videos.index');
    Route::get('/{id}', function () {
        return view('videos.show');
    })->name('videos.show');
    Route::get('/upload', function () {
        return view('videos.create');
    })->name('videos.create');
    Route::post('/', function () {
        return view('videos.store');
    })->name('videos.store');
});

// Matches
Route::prefix('matches')->group(function () {
    Route::get('/', function () {
        return view('matches.index');
    })->name('matches.index');
    Route::get('/{id}', function () {
        return view('matches.show');
    })->name('matches.show');
});

// Authentication
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login'); // يعرض صفحة تسجيل الدخول فقط
    })->name('login');
    Route::get('/signup', function () {
        return view('auth.signup'); // يعرض صفحة تسجيل الدخول فقط
    })->name('signup');
});

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', function () {
        return view('auth.logout'); // يعرض صفحة تسجيل الدخول فقط
    })->name('logout');
    
    // User Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', function () {
            return view('profile.edit'); // يعرض صفحة تسجيل الدخول فقط
        })->name('profile.edit');
        Route::put('/', function () {
            return view('profile.update'); // يعرض صفحة تسجيل الدخول فقط
        })->name('profile.update');
        Route::put('/password', function () {
            return view('profile.updatePassword'); // يعرض صفحة تسجيل الدخول فقط
        })->name('profile.password');
    });
    
});

// News
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', function () {
        return view('news.index'); // يعرض صفحة تسجيل الدخول فقط
    })->name('index');
    Route::get('/{id}', function () {
        return view('news.show'); // يعرض صفحة تسجيل الدخول فقط
    })->name('show');
});

// Static Pages
Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/about/developers', function () {
    return view('about.developers');
})->name('about.developers');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');
