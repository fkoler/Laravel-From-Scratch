<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Job;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * @desc Show all job listings.
     * @route GET /jobs
     * 
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::latest()->paginate(9);

        return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * @desc Show create job form.
     * @route GET /jobs/create
     * 
     * @return View
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * @desc Save job to database.
     * @route POST /jobs
     * 
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->file('company_logo'));
        // php artisan storage:link

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_website' => 'required|url',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif|max:2048',
        ]);

        // Set user_id to the authenticated user        
        $validatedData['user_id'] = Auth::user()->id;

        // Chack for image
        if ($request->hasFile('company_logo')) {
            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to $validatedData
            $validatedData['company_logo'] = $path;
        }

        // Submit to database
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully');
    }

    /**
     * @desc Display a single job listing.
     * @route GET /jobs/{$id}
     * 
     * @return View
     */
    public function show(Job $job): View
    {
        return view('jobs.show')->with('job', $job);
    }

    /**
     * @desc Show edit job form.
     * @route GET /jobs/{$id}/edit
     * 
     * @return View
     */
    public function edit(Job $job): View
    {
        // Check if user is authorized
        $this->authorize('update', $job);

        return view('jobs.edit')->with('job', $job);
    }

    /**
     * @desc Update a job listing.
     * @route PUT /jobs/{$id}
     * 
     * @return RedirectResponse
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        // Check if user is authorized
        $this->authorize('update', $job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_website' => 'required|url',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif|max:2048',
        ]);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete old logo
            Storage::delete('public/logos/' . basename($job->company_logo));

            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to $validatedData
            $validatedData['company_logo'] = $path;
        }

        // Update database
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully');
    }

    /**
     * @desc Delete a job listing.
     * @route DELETE /jobs/{$id}
     * 
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        // Check if user is authorized
        $this->authorize('delete', $job);

        // If logo exists, than delete it
        if ($job->company_logo) {
            Storage::delete('public/logos/' . $job->company_logo);
        }

        $job->delete();

        // Check if request came from the dashboard route
        if (request()->query('from') === 'dashboard') {
            return redirect()->route('dashboard')->with('success', 'Job listing deleted successfully');
        }

        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully');
    }

    /**
     * @desc Search job listings.
     * @route GET /jobs/search
     * 
     * @return View
     */
    public function search(Request $request): View
    {
        $keywords = strtolower($request->input('keywords'));
        $location = strtolower($request->input('location'));

        $query = Job::query();

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->whereRaw('LOWER(title) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(description) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(tags) like ?', ['%' . $keywords . '%']);
            });
        }

        if ($location) {
            $query->where(function ($q) use ($location) {
                $q->whereRaw('LOWER(address) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(city) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(state) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(zipcode) like ?', ['%' . $location . '%']);
            });
        }

        $jobs = $query->paginate(12);

        return view('jobs.index')->with('jobs', $jobs);
    }
}

// php artisan make:controller JobController --resource
