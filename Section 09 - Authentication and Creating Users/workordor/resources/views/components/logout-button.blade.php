<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center justify-start w-full text-white px-4 py-2 cursor-pointer hover:bg-blue-700">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>