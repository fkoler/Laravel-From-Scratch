<x-layout>
    <section class="flex flex-col md:flex-row gap-4 pb-2">
        {{-- Profile Info Form --}}
        <div class="p-8 rounded-xl border border-gray-900 w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                Profile Info
            </h3>

            @if ($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                        class="w-32 h-32 object-cover rounded-full">
                </div>
            @endif

            <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-inputs.text id="name" name="name" label="Name" value="{{ $user->name }}" />
                <x-inputs.text id="email" name="email" label="Email Address" type="email"
                    value="{{ $user->email }}" />

                <x-inputs.file id="avatar" name="avatar" label="Upload Avatar" />

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none cursor-pointer">
                    Save
                </button>
            </form>
        </div>
        {{-- Job Listings --}}
        <div class="p-8 rounded-xl border border-gray-900 w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My Job Listings
            </h3>

            @forelse($jobs as $job)
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $job->title }}</h3>

                        <p class="text-gray-500">{{ $job->job_type }}</p>
                    </div>

                    <div class="flex space-x-3">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                        {{-- Delete Form --}}
                        <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
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
                </div>
            @empty
                <p class="text-gray-700 text-center">You have not job listings</p>
            @endforelse
        </div>
    </section>

    <x-bottom-banner />

    {{-- Custom confirm --}}
    <script>
        const form = document.getElementById('profileForm');

        const original = {
            name: @json($user->name),
            email: @json($user->email),
        };

        form.addEventListener('submit', e => {
            const changes = [];

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const avatar = document.getElementById('avatar').files.length > 0;

            if (name !== original.name) changes.push("name");
            if (email !== original.email) changes.push("email address");
            if (avatar) changes.push("avatar");

            if (changes.length) {
                const formatted = changes.length === 1 ?
                    changes[0] :
                    changes.slice(0, -1).join(', ') + ' and ' + changes.at(-1);

                if (!confirm(`Are you sure you want to change ${formatted}?`)) {
                    e.preventDefault();
                }
            }
        });
    </script>
</x-layout>
