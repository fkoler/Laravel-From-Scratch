<x-layout>
    <x-slot name="title">Edit Job Listing</x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-blue-900 mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <h2 class="text-4xl text-center font-bold mb-4">Edit Job Listing</h2>

            <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">

                {{-- Job Info --}}
                @csrf
                @method('PUT')
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">Job Info</h2>

                <x-inputs.text type="text" id="title" name="title" label="Job Title"
                    placeholder="e.g. Web Developer" :value="old('title', $job->title)" />

                <x-inputs.text-area id="description" name="description" label="Job Description"
                    placeholder="e.g. We are seeking..." :value="old('description', $job->description)" />

                <x-inputs.text type="number" id="salary" name="salary" label="Annual Salary"
                    placeholder="e.g. 101000" :value="old('salary', $job->salary)" />

                <x-inputs.text-area id="requirements" name="requirements" label="Job Requirements"
                    placeholder="e.g. Bachelor's degree..." :value="old('requirements', $job->requirements)" />

                <x-inputs.text-area id="benefits" name="benefits" label="Job Benefits"
                    placeholder="e.g. Health insurance..." :value="old('benefits', $job->benefits)" rows="4" />

                <x-inputs.text type="text" id="tags" name="tags" label="Tags (comma-separated)"
                    placeholder="e.g. webdev, javascript, php" :value="old('tags', $job->tags)" />

                <x-inputs.select id="job_type" name="job_type" label="Job Type" :value="old('job_type', $job->job_type)" :options="[
                    'Full-Time' => 'Full-Time',
                    'Part-Time' => 'Part-Time',
                    'Contract' => 'Contract',
                    'Temporary' => 'Temporary',
                    'Internship' => 'Internship',
                    'Volunteer' => 'Volunteer',
                    'On-Call' => 'On-Call',
                    'B2B' => 'B2B',
                ]" />

                <x-inputs.select id="remote" name="remote" label="Remote" :value="old('remote', $job->remote)" :options="[0 => 'No', 1 => 'Yes']" />

                <x-inputs.text type="text" id="address" name="address" label="Address"
                    placeholder="e.g. 629 King St. W" :value="old('address', $job->address)" />

                <x-inputs.text type="text" id="city" name="city" label="City" placeholder="e.g. Toronto"
                    :value="old('city', $job->city)" />

                <x-inputs.text type="text" id="state" name="state" label="State" placeholder="e.g. ON"
                    :value="old('state', $job->state)" />

                <x-inputs.text type="text" id="zipcode" name="zipcode" label="Zipcode" placeholder="e.g. M5V 0G9"
                    :value="old('zipcode', $job->zipcode)" />

                {{-- Company Info --}}
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">Company Info</h2>

                <x-inputs.text type="text" id="company_name" name="company_name" label="Company Name"
                    placeholder="Enter Company Name" :value="old('company_name', $job->company_name)" />

                <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
                    placeholder="Company Description" rows="4" :value="old('company_description', $job->company_description)" />

                <x-inputs.text type="url" id="company_website" name="company_website" label="Company Website"
                    placeholder="Enter website" :value="old('company_website', $job->company_website)" />

                <x-inputs.text type="text" id="contact_phone" name="contact_phone" label="Contact Phone"
                    placeholder="Enter phone" :value="old('contact_phone', $job->contact_phone)" />

                <x-inputs.text type="email" id="contact_email" name="contact_email" label="Contact Email"
                    placeholder="Email where you want to receive applications" :value="old('contact_email', $job->contact_email)" />

                <x-inputs.file id="company_logo" name="company_logo" label="Company Logo" />

                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 my-3 rounded focus:outline-none cursor-pointer">Save</button>
            </form>
        </div>
    </main>
</x-layout>
