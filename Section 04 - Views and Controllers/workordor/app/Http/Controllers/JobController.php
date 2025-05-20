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

    /**
     * Show the create form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Display the specified job
     *
     * @param string $id 
     * @return string
     */
    public function show(string $id)
    {
        return "Showing Job $id";
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        return "Title: $title, Description: $description";
    }
}

// php artisan make:controller JobController
// https://github.com/alexeymezenin/laravel-best-practices?tab=readme-ov-file#follow-laravel-naming-conventions