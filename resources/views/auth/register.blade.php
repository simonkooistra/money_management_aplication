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
                <div class="text-message">{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="container">
        <h1>Register</h1>
        <h3>Make an account</h3>

        <input type="text" placeholder="full name..." name="name" id="name" required>
        @error('name')
        <div class="text-message">{{ $message }}</div>
        @enderror

        <input type="text" placeholder="email address" name="email" id="email" required>
        @error('email')
        <div class="text-message">{{ $message }}</div>
        @enderror
        <input type="password" placeholder="password..." name="password" id="password" required>
        @error('password')
        <div class="text-message">{{ $message }}</div>
        @enderror
        <input type="password" placeholder="password..." name="password_confirmation" id="password_confirmation"
               required>
        <div id="btn-container">
            <h4>show password</h4>
         <input type="checkbox">
        <button type="submit" value="Register" class="register_btn">register</button>
    <div class="container sign_in">
        <a href="{{ route('login') }}" id="rg-lnk">back to login-page</a>
    </div>
        </div>
    </div>

</form>
@vite(['resources/js/app.js'])
</body>
</html>