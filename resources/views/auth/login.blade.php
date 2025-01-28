<!doctype html>
<html lang="en">
@vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log in</title>
</head>

<body class="login">
<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="container">
        <h1>log in</h1>

        @error('email')
        <div class="text-message">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="Email Address" name="email" required>

        @error('password')
        <span class="text-message">{{ $message }}</span>
        @enderror

        <input type="password" placeholder="password" name="password" required>

        <div class="container">

            <button type="submit">log in</button>



            <p>you dont have an account?</p><a href="{{route('register')}}">>go to register<</a>

        </div>
    </div>

</form>
</body>

</html>