@props([
    'class' => 'text-white cursor-pointer',
])

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="{{ $class }}">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>
