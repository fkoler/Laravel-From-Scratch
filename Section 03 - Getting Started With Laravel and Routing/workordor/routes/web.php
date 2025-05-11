<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return '<h1>Available Jobs</h1>';
})->name('jobs');

Route::get('/abq', function () {
    return response(
        '<h1>Representing the ABQ. What up biat**?! Leave at the tone.</h1>',
        200
    )->header('Content-Type', 'text/html');
});

// Route::get('/abq/json', function () {
//     return response()->json(['abq' => 'Representing the ABQ. What up biat**?! Leave at the tone.']);
// });

Route::get('/download', function () {
    return response()->download(public_path('favicon.ico'));
});

Route::get('/abq/json', function () {
    return response()->json(['abq' => 'Representing the ABQ. What up biat**?! Leave at the tone.'])->cookie('name', 'Jesse Pinkman');
});

Route::get('read-cookie', function (Request $request) {
    $cookieValue = $request->cookie('name');

    return response()->json(['cookie' => $cookieValue]);
});

// Route::get('/zed', function () {
//     return response(
//         'Zed is dead baby',
//         404
//     );
// });
