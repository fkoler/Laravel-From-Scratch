<x-layout>
    <x-slot name="title">Create New Job</x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-blue-900 mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <h2 class="text-4xl text-center font-bold mb-4">
                Create Job Listing
            </h2>

            <form method="POST" action="/jobs" enctype="multipart/form-data">

                {{-- Job Info --}}
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">
                    Job Info
                </h2>

                <x-inputs.text type="text" id="title" name="title" label="Job Title"
                    placeholder="e.g. Web Developer" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="description">Job Description</label>
                    <textarea cols="30" rows="7" id="description" name="description"
                        class="w-full px-4 py-2 border rounded focus:outline-none
                        @error('description')
                            border-red-500                            
                        @enderror"
                        placeholder="We are seeking...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-inputs.text type="text" id="salary" name="salary" label="Annual Salary"
                    placeholder="e.g. 101000" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="requirements">Requirements</label>
                    <textarea id="requirements" name="requirements" class="w-full px-4 py-2 border rounded focus:outline-none"
                        placeholder="Bachelor's degree..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300" for="benefits">Benefits</label>
                    <textarea id="benefits" name="benefits" class="w-full px-4 py-2 border rounded focus:outline-none"
                        placeholder="Health insurance..."></textarea>
                </div>

                <x-inputs.text type="text" id="tags" name="tags" label="Tags (comma-separated)"
                    placeholder="e.g. webdev, javascript, php" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="job_type">Job Type</label>
                    <select id="job_type" name="job_type"
                        class="bg-blue-900 w-full px-4 py-2 border rounded focus:outline-none
                        @error('job_type')
                            border-red-500                            
                        @enderror">
                        <option value="Full-Time" {{ old('job_type') === 'Full-Time' ? 'selected' : '' }}>
                            Full-Time
                        </option>
                        <option value="Part-Time" {{ old('job_type') === 'Part-Time' ? 'selected' : '' }}>
                            Part-Time
                        </option>
                        <option value="Contract" {{ old('job_type') === 'Contract' ? 'selected' : '' }}>
                            Contract
                        </option>
                        <option value="Temporary" {{ old('job_type') === 'Temporary' ? 'selected' : '' }}>
                            Temporary
                        </option>
                        <option value="Internship" {{ old('job_type') === 'Internship' ? 'selected' : '' }}>
                            Internship
                        </option>
                        <option value="Volunteer" {{ old('job_type') === 'Volunteer' ? 'selected' : '' }}>
                            Volunteer
                        </option>
                        <option value="On-Call" {{ old('job_type') === 'On-Call' ? 'selected' : '' }}>
                            On-Call
                        </option>
                    </select>
                    @error('job_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-300" for="remote">Remote</label>
                    <select id="remote" name="remote"
                        class="bg-blue-900 w-full px-4 py-2 border rounded focus:outline-none">
                        <option value="false">No</option>
                        <option value="true">Yes</option>
                    </select>
                </div>

                <x-inputs.text type="text" id="city" name="city" label="Address"
                    placeholder="e.g. 629 King St. W" />

                <x-inputs.text type="text" id="city" name="city" label="City" placeholder="Toronto" />

                <x-inputs.text type="text" id="state" name="state" label="State" placeholder="ON" />

                <x-inputs.text type="text" id="zipcode" name="zipcode" label="Zipcode" placeholder="M5V 0G9" />

                {{-- Company Info --}}
                <h2 class="text-2xl font-bold mb-6 text-center text-blue-200">
                    Company Info
                </h2>

                <x-inputs.text type="text" id="company_name" name="company_name" label="Company Name"
                    placeholder="Company Name" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="company_description">Company Description</label>
                    <textarea id="company_description" name="company_description"
                        class="w-full px-4 py-2 border rounded focus:outline-none" placeholder="Company Description"></textarea>
                </div>

                <x-inputs.text type="text" id="company_website" name="company_website" label="Company Website"
                    placeholder="Enter website" />

                <x-inputs.text type="text" id="contact_phone" name="contact_phone" label="Contact Phone"
                    placeholder="Enter phone" />

                <x-inputs.text type="email" id="contact_email" name="contact_email" label="Contact Email"
                    placeholder="Email where you want to receive applications" />

                <div class="mb-4">
                    <label class="block text-gray-300" for="company_logo">Company Logo</label>
                    <input id="company_logo" type="file" name="company_logo"
                        class="text-gray-300 w-full px-4 py-2 border rounded focus:outline-none cursor-pointer
                        @error('company_logo')
                            border-red-500                            
                        @enderror" />
                    @error('company_logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 my-3 rounded focus:outline-none cursor-pointer">
                    Save
                </button>
            </form>
        </div>
    </main>
</x-layout>
