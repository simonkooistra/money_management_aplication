<!doctype html>
<html lang="en">
@vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aanmelden</title>
</head>

<body class="login">
<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="container">
        <h1>Aanmelden</h1>

        @error('email')
        <span class="text-message">{{ $message }}</span>
        @enderror
        <input type="text" placeholder="Email Address" name="email" required>

        @error('password')
        <span class="text-message">{{ $message }}</span>
        @enderror

        <input type="password" placeholder="Wachtwoord" name="password" required>

        <div class="container">

            <button type="submit">Aanmelden</button>

{{--            <a href="#">Wachtwoord vergeten?</a>--}}

            <a href="register">Registreren?</a>

        </div>
    </div>

</form>
</body>

</html>