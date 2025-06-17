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

                    <div class="flex space-x-3 ml-4">
                        <a href="/edit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                        {{-- Delete Form --}}
                        <form method="POST">
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded cursor-pointer">
                                Delete
                            </button>
                        </form>
                        {{-- End Delete Form --}}
                    </div>
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

                        <li class="mb-2">
                            <strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Job Details --}}
            <div class="container mx-auto p-4">
                <h2 class="text-xl font-semibold mb-4">Job Details</h2>

                <div class="rounded-lg shadow-md bg-blue-900 text-gray-400 p-4">
                    <h3 class="text-lg font-semibold mb-2 text-white">
                        Job Requirements
                    </h3>

                    <p>{{ $job->requirements }}</p>

                    <h3 class="text-lg font-semibold mt-4 mb-2 text-white">Benefits</h3>

                    <p>{{ $job->benefits }}</p>
                </div>

                <p class="my-5">
                    Put "Job Application" as the subject of your email
                    and attach your resume.
                </p>

                <a href="mailto:{{ $job->contact_email }}"
                    class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-200 hover:bg-indigo-300">
                    Apply Now
                </a>
            </div>

            {{-- Map --}}
            <div class="bg-blue-900 p-6 rounded-lg shadow-md mt-6">
                <div id="map"></div>
            </div>
        </section>
    </div>
</x-layout>
