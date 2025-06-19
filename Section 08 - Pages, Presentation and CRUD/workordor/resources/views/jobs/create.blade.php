<x-layout>
    <x-slot name="title">Create New Job</x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-blue-900 mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <h2 class="text-4xl text-center font-bold mb-4">Create Job Listing</h2>

            <form method="POST" action="/jobs" enctype="multipart/form-data">

                {{-- Job Info --}}
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">Job Info</h2>

                <x-inputs.text type="text" id="title" name="title" label="Job Title"
                    placeholder="e.g. Web Developer" />

                <x-inputs.text-area id="description" name="description" label="Job Description"
                    placeholder="e.g. We are seeking..." />

                <x-inputs.text type="text" id="salary" name="salary" label="Annual Salary"
                    placeholder="e.g. 101000" />

                <x-inputs.text-area id="requirements" name="requirements" label="Job Requirements"
                    placeholder="e.g. Bachelor's degree..." />

                <x-inputs.text-area id="benefits" name="benefits" label="Job Benefits"
                    placeholder="e.g. Health insurance..." rows="4" />

                <x-inputs.text type="text" id="tags" name="tags" label="Tags (comma-separated)"
                    placeholder="e.g. webdev, javascript, php" />

                <x-inputs.select id="job_type" name="job_type" label="Job Type" value="{{ old('job_type') }}"
                    :options="[
                        'Full-Time' => 'Full-Time',
                        'Part-Time' => 'Part-Time',
                        'Contract' => 'Contract',
                        'Temporary' => 'Temporary',
                        'Internship' => 'Internship',
                        'Volunteer' => 'Volunteer',
                        'On-Call' => 'On-Call',
                        'B2B' => 'B2B',
                    ]" />

                <x-inputs.select id="remote" name="remote" label="Remote" :options="[0 => 'No', 1 => 'Yes']" />

                <x-inputs.text type="text" id="city" name="city" label="Address"
                    placeholder="e.g. 629 King St. W" />

                <x-inputs.text type="text" id="city" name="city" label="City" placeholder="Toronto" />

                <x-inputs.text type="text" id="state" name="state" label="State" placeholder="ON" />

                <x-inputs.text type="text" id="zipcode" name="zipcode" label="Zipcode" placeholder="M5V 0G9" />

                {{-- Company Info --}}
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">Company Info</h2>

                <x-inputs.text type="text" id="company_name" name="company_name" label="Company Name"
                    placeholder="Enter Company Name" />

                <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
                    placeholder="Company Description" rows="4" />

                <x-inputs.text type="text" id="company_website" name="company_website" label="Company Website"
                    placeholder="Enter website" />

                <x-inputs.text type="text" id="contact_phone" name="contact_phone" label="Contact Phone"
                    placeholder="Enter phone" />

                <x-inputs.text type="email" id="contact_email" name="contact_email" label="Contact Email"
                    placeholder="Email where you want to receive applications" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="company_logo">Company Logo</label>
                    <input id="company_logo" type="file" name="company_logo"
                        class="text-gray-400 w-full px-4 py-2 border rounded focus:outline-none cursor-pointer
                        @error('company_logo')
                            border-red-500                            
                        @enderror" />
                    @error('company_logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 my-3 rounded focus:outline-none cursor-pointer">Save</button>
            </form>
        </div>
    </main>
</x-layout>
