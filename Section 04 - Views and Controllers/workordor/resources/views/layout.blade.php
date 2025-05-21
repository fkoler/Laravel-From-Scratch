<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            Wokordor | @yield('title')
        @else
            Wokordor | Find and list Jobs
        @endif
    </title>
</head>

<body style="background-color: #0a0a0a; color: #EDEDEC; font-family: sans-serif">
    @include('partials.navbar')

    <main class="container mx-auto p-4 mt-4">
        @yield('content')
    </main>
</body>

</html>
