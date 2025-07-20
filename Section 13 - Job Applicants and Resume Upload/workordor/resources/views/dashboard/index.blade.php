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
            <h3 class="text-3xl text-center font-bold mb-8">
                My Job Listings
            </h3>

            @forelse($jobs as $job)
                <div class="mt-4 p-4 rounded-lg bg-gray-900 w-full">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                            <p class="text-gray-500 mt-1">{{ $job->job_type }}</p>
                        </div>

                        <div class="flex space-x-3">
                            <a href="{{ route('jobs.edit', $job->id) }}"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
                                onsubmit="return confirm('Are you sure that you want to delete the job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded cursor-pointer">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Applicants --}}
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold mb-2">Applicants</h4>

                        @forelse ($job->applicants as $applicant)
                            <div class="py-2">
                                <p class="text-blue-400">
                                    <strong>Name: </strong> {{ $applicant->full_name }}
                                </p>

                                <p class="text-blue-400">
                                    <strong>Phone: </strong> {{ $applicant->contact_phone }}
                                </p>

                                <p class="text-blue-400">
                                    <strong>Email: </strong> {{ $applicant->contact_email }}
                                </p>

                                <p class="text-blue-400">
                                    <strong>Message: </strong> {{ $applicant->message }}
                                </p>

                                <p class="text-blue-400 hover:text-blue-500 hover:underline mt-2 text-sm">
                                    <a href="{{ asset('storage/' . $applicant->resume_path) }}" download>
                                        <i class="fas fa-download mr-1"></i> Download Resume
                                    </a>
                                </p>

                                {{-- Delete Applicant --}}
                                <form method="POST" action="{{ route('applicant.destroy', $applicant->id) }}"
                                    onsubmit="return confirm('Are you sure that you want to delete the applicant?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-600 text-sm mt-2 cursor-pointer">
                                        <i class="fas fa-trash mr-1.5"></i> Delete Applicant
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 mb-5">No applicants for this job</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center">You don't have any job listings</p>
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
