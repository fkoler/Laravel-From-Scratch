<x-layout>
    <div class="bg-[#0a0a0a] h-1/12 px-4 mb-7 flex justify-center items-center text-center mx-auto">
        <x-search />
    </div>

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
