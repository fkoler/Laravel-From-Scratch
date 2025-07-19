<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\Job;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    /**
     * @desc Store new job application
     * @route POST /jobs/{job}/apply
     * 
     * @return RedirectResponse
     */
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle resume uplaod
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // Store the application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = Auth::id();
        $application->save();

        return redirect()->back()->with('success', 'Your application has been submitted');
    }
}
