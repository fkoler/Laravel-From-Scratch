<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
</head>

<body style="background-color: #0a0a0a; color: #EDEDEC; font-family: sans-serif">
    <h1>{{ $title }}</h1>

    <ul>

        @forelse ($jobs as $job)
            @if ($job === 'Backend Developer')
                {{-- @break --}}
                {{-- @continue --}}
            @endif
            {{-- <li>{{ $loop->index }} - {{ $job }}</li> --}}
            {{-- <li>{{ $loop->iteration }} - {{ $job }}</li> --}}
            {{-- <li>{{ $loop->remaining }} - {{ $job }}</li> --}}
            {{-- <li>{{ $loop->count }} - {{ $job }}</li> --}}

            {{-- @if ($loop->first)
                <li>First - {{ $job }}</li>
            @else
                <li>{{ $job }}</li>
            @endif --}}

            {{-- @if ($loop->last)
                <li>Last - {{ $job }}</li>
            @else
                <li>{{ $job }}</li>
            @endif --}}

            @if ($loop->even)
                <li>Even - {{ $job }}</li>
            @else
                <li>Odd - {{ $job }}</li>
            @endif
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </ul>
</body>

</html>
