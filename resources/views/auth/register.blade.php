<!doctype html>
<html lang="en">
@vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreren</title>
</head>

<body class="login">
<form action="{{ route('register') }}" method="post">
    @csrf

    @if($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container">
        <h1>Account registreren</h1>
        <p>Maak hier uw account aan!</p>


        <input type="text" placeholder="Volledige naam" name="name" id="name" required>
        @error('name')
        <span style="color:red;">{{ $message }}</span>
        @enderror

        <input type="text" placeholder="Email Address" name="email" id="email" required>
        @error('email')
        <span style="color:red;">{{ $message }}</span>
        @enderror

        <input type="password" placeholder="Wachtwoord" name="password" id="password" required>
        @error('password')
        <span style="color:red;">{{ $message }}</span>
        @enderror

        <input type="password" placeholder="Herhaal wachtwoord" name="password_confirmation" id="password_confirmation"
               required>


        <button type="submit" value="Register" class="registerbtn">Registreren</button>
    </div>

    <div class="container signin">
        <p>Heb je al een account? <a href="{{ route('login') }}">Log in</a></p>
    </div>
</form>
</body>
</html>