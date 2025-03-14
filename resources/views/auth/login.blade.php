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
        <h1>welcome to geldvreter</h1>
        <h2>login</h2>

        @error('email')
        <div class="text-message">{{ $message }}</div>
        @enderror
        <input type="text" placeholder="Email Address" name="email" required>

        @error('password')
        <div class="text-message">{{ $message }}</div>
        @enderror

        <input type="password" id="password" placeholder="password" name="password" required>
        <div class="action-container">
            <p>show password</p>
            <input type="checkbox" id="checkBoxSpw">
            <button type="submit">login</button>
            <h3>become a member</h3>
            <a href="{{route('register')}}" id="rg-lnk"><p>make a new account!</p></a>
        </div>
    </div>

</form>
</body>
@vite(['resources/js/app.js'])
</html>