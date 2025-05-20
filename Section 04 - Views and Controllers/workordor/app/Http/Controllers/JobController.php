<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Show the jobs index page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Available Jobs';
        $jobs = [
            'Web Developer',
            'Software Engineer',
            'Backend Developer',
            'DevOps Engineer',
        ];

        return view('jobs.index', compact('title', 'jobs'));
    }
}

// php artisan make:controller JobController
// https://github.com/alexeymezenin/laravel-best-practices?tab=readme-ov-file#follow-laravel-naming-conventions