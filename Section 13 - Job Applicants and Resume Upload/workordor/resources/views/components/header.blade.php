{{-- Header --}}
<header x-data="{ open: false }" class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workordor</a>
        </h1>

        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
            @auth
                <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')">Bookmarks</x-nav-link>
                <x-logout-button />

                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full">
                        @else
                            <img src="{{ asset('images/sample_avatar.png') }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full">
                        @endif
                    </a>
                </div>
                <x-button-link url="/jobs/create" icon="edit">Create Job</x-button-link>
            @else
                <x-nav-link url="/login" :active="request()->is('login')" icon="user">Login</x-nav-link>
                <x-nav-link url="/register" :active="request()->is('register')">Register</x-nav-link>
            @endauth
        </nav>

        <button @click="open = !open" id="hamburger" class="text-white md:hidden flex items-center cursor-pointer">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <nav x-show="open" @click.away="open = false" id="mobile-menu" :class="{ 'hidden': !open, 'block': open }"
        class="md:hidden bg-blue-900 text-white mt-5 pb-3 space-y-2">
        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">All Jobs</x-nav-link>
        @auth
            <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')" :mobile="true">Saved Jobs</x-nav-link>
            <x-nav-link url="/dashboard" :active="request()->is('dashboard')" :mobile="true">Dashboard</x-nav-link>
            <x-logout-button class="block px-4 py-2 hover:bg-blue-700 w-full text-left cursor-pointer" />
            <x-button-link url="/jobs/create" icon="edit" :block="true">Create Job</x-button-link>
        @else
            <x-nav-link url="/login" :active="request()->is('login')" :mobile="true">Login</x-nav-link>
            <x-nav-link url="/register" :active="request()->is('register')" :mobile="true">Register</x-nav-link>
        @endauth
    </nav>
</header>
