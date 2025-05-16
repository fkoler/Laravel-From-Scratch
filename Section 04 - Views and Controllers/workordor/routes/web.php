<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/jobs', function () {
//     return view('jobs.index', [
//         'title' => 'Available Jobs'
//     ]);
// })->name('jobs');

// Route::get('/jobs', function () {
//     $title = 'Available Jobs';

//     return view('jobs.index')->with('title', $title);
// })->name('jobs');

Route::get('/jobs', function () {
    $title = 'Available Jobs';
    $jobs = [
        'Web Developer',
        'Software Engineer',
        'Backend Developer',
        'DevOps Engineer',
    ];

    return view('jobs.index', compact('title', 'jobs'));
})->name('jobs');

Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');
