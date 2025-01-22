<!doctype html>
<html lang="en">
@vite(['resources/css/app.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Layout')</title>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <ul class="nav-links">
            <li><a href="/">Home (totaalpagina)</a></li>
            <li><a href="{{ route('user_category.index') }}">Categories</a></li>
            <li><a href="{{ route('user_saving.index') }}">Savings</a></li>
            <li><a href="{{ route('transaction.index') }}">Transactions</a></li>
        </ul>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="uitloggen">
        </form>
    </aside>

    <main class="content">
        @yield('content')
    </main>

</div>

</body>
</html>