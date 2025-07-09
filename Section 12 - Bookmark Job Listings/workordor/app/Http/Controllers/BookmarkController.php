<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{

    /**
     * @desc Get all users bookmarks
     * @route GET /bookmarks
     * 
     * @return View
     */

    // 
    // 
    public function index(): View
    {
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);

        // dd($bookmarks);

        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }
}
