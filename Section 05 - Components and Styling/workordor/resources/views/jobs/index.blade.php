<x-layout>
    <h1>Available Jobs</h1>

    <ul>
        @forelse ($jobs as $job)
            <li>{{ $job }}</li>
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </ul>
</x-layout>
