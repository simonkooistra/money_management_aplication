<!doctype html>
<html lang="en">
@vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>

<body class="login">
<form action="{{ route('register') }}" method="post">
    @csrf

    @if($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="container">
        <h1>register</h1>
        <p>make your own account!</p>

        <input type="text" placeholder="full name..." name="name" id="name" required>
        @error('name')
        <div>{{ $message }}</div>
        @enderror

        <input type="text" placeholder="email address" name="email" id="email" required>
        @error('email')
        <div>{{ $message }}</div>
        @enderror

        <input type="password" placeholder="password..." name="password" id="password" required>
        @error('password')
        <div>{{ $message }}</div>
        @enderror

        <input type="password" placeholder="password..." name="password_confirmation" id="password_confirmation"
               required>
        <button type="submit" value="Register" class="register_btn">register</button>
    </div>

    <div class="container sign_in">
        <p>do you all ready have an account?</p><a href="{{ route('login') }}">>go to log in<</a>
    </div>
</form>
</body>
</html>