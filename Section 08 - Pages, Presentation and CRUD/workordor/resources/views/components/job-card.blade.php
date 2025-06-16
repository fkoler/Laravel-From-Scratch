@props(['job'])

<div class="rounded-lg shadow-md bg-blue-900 text-white p-4">
    <div class="flex items-center space-between gap-4">
        <img src="/images/logos/logo-algorix.png" alt="" class="w-14" />
        <div>
            <h2 class="text-xl font-semibold">
                {{ $job->title }}
            </h2>

            <p class="text-sm text-gray-300">{{ $job->job_type }}</p>
        </div>
    </div>

    <p class="text-gray-400 text-lg mt-2">{{ Str::limit($job->description, 110) }}</p>

    <ul class="my-4 bg-indigo-500 text-gray-300 p-4 rounded">
        <li class="mb-2"><strong>Salary:</strong> ${{ number_format($job->salary) }}</li>

        <li class="mb-2">
            <strong>Location:</strong> {{ $job->city }}, {{ $job->state }}
            @if ($job->remote)
                <span class="text-xs bg-green-600 text-gray-100 rounded-full px-2 py-1 ml-2">Remote</span>
            @else
                <span class="text-xs bg-red-600 text-gray-100 rounded-full px-2 py-1 ml-2">On-site</span>
            @endif
        </li>

        <li class="mb-2">
            <strong>Tags:</strong> {{ $job->tags }}
        </li>
    </ul>

    <a href="{{ route('jobs.show', $job->id) }}"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-200 hover:bg-indigo-300">
        Details
    </a>
</div>
