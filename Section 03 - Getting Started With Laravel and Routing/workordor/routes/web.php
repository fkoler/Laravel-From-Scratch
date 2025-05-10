<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

// Route::post('/submit', function () {
//     return 'Submitted';
// });

// Route::match(['get', 'post'], '/submit', function () {
//     return 'Submitted';
// });

Route::any('/submit', function () {
    return 'Submitted';
});

Route::get('/test', function () {
    $url = route('jobs');

    return "<a href='$url'>Click Here</a>";
});

Route::get('/api/users', function () {
    return [
        'name' => 'Alex Skolnick',
        'email' => 'alex@skolnick.io',
    ];
});

// php artisan route:list
