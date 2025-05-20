<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job</title>
</head>

<body style="background-color: #0a0a0a; color: #EDEDEC; font-family: sans-serif">
    <h1>Create New Job</h1>

    <form action="/jobs" method="POST">
        <input type=text name="title" placeholder="title">
        <input type=text name="description" placeholder="description">

        <button type="submit">Submit</button>
    </form>
</body>

</html>
