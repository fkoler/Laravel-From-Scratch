<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

Route::get('/abq', function () {
    return response(
        'Representing the ABQ. What up biat**?! Leave at the tone.',
        200
    );
});

Route::get('/zed', function () {
    return response(
        'Zed is dead baby',
        404
    );
});
