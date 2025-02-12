<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/fooldal/style2.css') }}" rel="stylesheet" >
    <title>Főoldal</title>
</head>
<body>
    <div class="container">
        <h1>Üdvözöllek a Főoldalon!</h1>
        <p>Ez egy egyszerű Laravel alkalmazás főoldala.</p>
        <a href="{{ route('bejelentkezes') }}">Bejelentkezés</a>
    </div>
</body>
</html>
