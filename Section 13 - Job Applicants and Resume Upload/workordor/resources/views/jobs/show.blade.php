<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <section class="md:col-span-3">
            {{-- Main Content --}}
            <div class="rounded-lg shadow-md bg-blue-900 text-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-white" href="{{ route('jobs.index') }}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        Back To Listings
                    </a>

                    @can('update', $job)
                        <div class="flex space-x-3 ml-4">
                            <a href="{{ route('jobs.edit', $job->id) }}"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                            {{-- Delete Form --}}
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                                onsubmit="return confirm('Are you sure that you want to delete this job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded cursor-pointer">
                                    Delete
                                </button>
                            </form>
                            {{-- End Delete Form --}}
                        </div>
                    @endcan
                </div>

                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $job->title }}</h2>

                    <p class="text-gray-400 text-lg mt-2">{{ $job->description }}</p>

                    <ul class="my-4 bg-indigo-500 text-gray-300 p-4 rounded">
                        <li class="mb-2">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>

                        <li class="mb-2">
                            <strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}
                        </li>

                        <li class="mb-2">
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>

                        <li class="mb-2">
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                        </li>

                        @if ($job->tags)
                            <li class="mb-2">
                                <strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Job Details --}}
            <div class="container mx-auto p-4">
                @if ($job->requirements || $job->benefits)
                    <h2 class="text-xl font-semibold mb-4">Job Details</h2>

                    <div class="rounded-lg shadow-md bg-blue-900 text-gray-400 p-4">
                        <h3 class="text-lg font-semibold mb-2 text-white">
                            Job Requirements
                        </h3>

                        <p>{{ $job->requirements }}</p>

                        <h3 class="text-lg font-semibold mt-4 mb-2 text-white">Benefits</h3>

                        <p>{{ $job->benefits }}</p>
                    </div>
                @endif

                @auth
                    <p class="rounded-lg shadow-md bg-blue-900 text-gray-400 p-4 my-6">
                        Put "Job Application" as the subject of your email
                        and attach your resume
                    </p>

                    {{-- Modal --}}
                    <div x-data="{ open: false }">
                        <button @click="open = true"
                            class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-200 hover:bg-indigo-300">
                            Apply Now
                        </button>

                        <div x-cloak x-show="open"
                            class="fixed inset-0 flex items-center justify-center bg-[#0a0a0a]/50 text-[#EDEDEC]">
                            <div @click.away="open = false"
                                class="bg-blue-900 text-gray-400 p-6 rounded-lg shadow-md w-full max-w-md z-40">
                                <h3 class="text-lg font-semibold mb-4">
                                    Apply for {{ $job->title }}
                                </h3>

                                <form enctype="multipart/form-data">
                                    @csrf
                                    <x-inputs.text id="full_name" name="full_name" label="Full Name" :required="true" />
                                    <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" />
                                    <x-inputs.text id="contact_email" name="contact_email" label="Contact Email"
                                        :required="true" />
                                    <x-inputs.text-area id="message" name="message" label="Message" />
                                    <x-inputs.text id="location" name="location" label="Location" />
                                    <x-inputs.file id="resume" name="resume" label="Upload Your Resume (*.pdf)"
                                        :required="true" />

                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md cursor-pointer">
                                        Submit Application
                                    </button>
                                    <button @click="open = false"
                                        class="px-4 py-2 bg-gray-700 hover:bg-gray-800 text-gray-200 rounded-md cursor-pointer">
                                        Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="rounded-lg shadow-md bg-blue-900 text-gray-400 p-4 mt-6">
                        <i class="fas fa-info-circle mr-1"></i> You must be logged in to apply for the job
                    </p>
                @endauth
            </div>

            {{-- Map --}}
            <div class="bg-blue-900 p-6 rounded-lg shadow-md mt-4">
                <div id="map"></div>
            </div>
        </section>

        {{-- Sidebar --}}
        <aside class="bg-blue-900 text-white rounded-lg shadow-md p-3">
            <h3 class="text-xl text-center mb-4 font-bold">Company Info</h3>

            @if ($job->company_logo)
                <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}"
                    class="w-full rounded-lg mb-4 m-auto" />
            @endif

            <h4 class="text-lg font-bold text-gray-300">{{ $job->company_name }}</h4>

            @if ($job->company_description)
                <p class="text-gray-400 text-base my-3">{{ $job->company_description }}</p>
            @endif

            <a href="{{ $job->company_website }}" target="_blank"
                class="text-indigo-200 hover:text-indigo-300 shadow-md">Visit Website</a>

            {{-- Bookmark Button --}}
            @guest
                <p
                    class="opacity-75 hover:opacity-100 mt-10 bg-gray-500 text-gray-900 font-bold w-full py-2 px-4 cursor-not-allowed rounded-full text-center">
                    <i class="fas fa-info-circle mr-1"></i> You must be logged in to bookmark the job
                </p>
            @else
                @php
                    $isBookmarked = auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists();
                @endphp

                <form method="POST"
                    action="{{ $isBookmarked ? route('bookmarks.destroy', $job->id) : route('bookmarks.store', $job->id) }}"
                    class="mt-10">
                    @csrf
                    @if ($isBookmarked)
                        @method('DELETE')
                        <button
                            class="bg-red-500 hover:bg-red-600 text-gray-100 font-semibold w-full py-2 px-4 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="fas fa-bookmark mr-1"></i> Remove Bookmark
                        </button>
                    @else
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold w-full py-2 px-4 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="fas fa-bookmark mr-1"></i> Bookmark Job
                        </button>
                    @endif
                </form>
            @endguest
        </aside>
    </div>
</x-layout>
