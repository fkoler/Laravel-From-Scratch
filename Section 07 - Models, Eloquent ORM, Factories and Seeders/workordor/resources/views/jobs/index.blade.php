<x-layout>
    <x-slot name="title">Available Jobs</x-slot>
    <h1>Available Jobs</h1>

    <br>

    <ul>
        @forelse ($jobs as $job)
            <li><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }} - {{ $job->description }}</a></li>
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </ul>
</x-layout>
