<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Job;

class BookmarkController extends Controller
{

    /**
     * @desc Get all users bookmarks.
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

    /**
     * @desc Create new bookmarked job.
     * @route POST /bookmarks/{job}
     * 
     * @return RedirectResponse
     */
    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the job is already bookmarked
        if ($user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('status', 'Job is already bookmarked');
        }

        // Create new bookmark
        $user->bookmarkedJobs()->attach($job->id);

        return back()->with('success', 'Job bookmarked successfully');
    }

    /**
     * @desc Remove bookmarked job.
     * @route DELETE /bookmarks/{job}
     * 
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the job is not bookmarked
        if (!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'Job is not bookmarked');
        }

        // Remove bookmark
        $user->bookmarkedJobs()->detach($job->id);

        return back()->with('success', 'Bookmark removed successfully');
    }
}
