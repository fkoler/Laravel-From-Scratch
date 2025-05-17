<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
</head>

<body style="background-color: #0a0a0a; color: #EDEDEC; font-family: sans-serif">
    <h1>{{ $title }}</h1>

    @if (!empty($jobs))
        <ul>
            @foreach ($jobs as $job)
                <li>{{ $job }}</li>
            @endforeach
        </ul>
    @else
        <p>No Jobs Available</p>
    @endif
</body>

</html>
