<x-layout>
    <x-slot name="title">Create New Job</x-slot>
    <h1>Create New Job</h1>

    <form action="/jobs" method="POST">
        @csrf
        <input class="bg-blue-700 w-full md:w-72 px-4 py-3 focus:outline-none" type=text name="title"
            placeholder="title">
        <input class="bg-blue-700 w-full md:w-72 px-4 py-3 focus:outline-none" type=text name="description"
            placeholder="description">

        <button
            class="bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300 cursor-pointer"
            type="submit">Submit</button>
    </form>
</x-layout>
