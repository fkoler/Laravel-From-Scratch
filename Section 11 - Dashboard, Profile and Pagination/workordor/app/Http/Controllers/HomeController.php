<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Job;

class HomeController extends Controller
{
    /**
     * @desc Show home index view.
     * @route GET /
     * 
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::latest()->limit(6)->get();

        return view('pages.index')->with('jobs', $jobs);
    }
}
