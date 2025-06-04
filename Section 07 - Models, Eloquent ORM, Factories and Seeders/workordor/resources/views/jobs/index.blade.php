<x-layout>
    <x-slot name="title">Available Jobs</x-slot>
    <h1>Available Jobs</h1>

    <br>

    <ul>
        @forelse ($jobs as $job)
            <li>{{ $job->title }} - {{ $job->description }}</li>
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </ul>
</x-layout>
