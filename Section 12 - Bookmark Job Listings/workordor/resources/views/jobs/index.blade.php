<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </div>

    {{-- Pagination links --}}
    {{ $jobs->links() }}
</x-layout>

<x-bottom-banner />
