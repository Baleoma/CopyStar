<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body class="bg-dark">

<header class="p-3 text-bg-dark bg-black">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="fs-4 px-3 text-warning">Copy Star</a></li>
                <li><a href="/" class="nav-link px-2 text-white">О нас</a></li>
                <li><a href="/catalog" class="nav-link px-2 text-white">Каталог</a></li>
                <li><a href="/where" class="nav-link px-2 text-white">Где нас найти</a></li>
            </ul>

            @auth()
                <div class="text-end">
                    <a class="btn btn-warning" href="/cart">Корзина</a>

                    <!-- Новая кнопка админ-панели -->
                    @if(Auth::user()->role_id === 1)
                        <a class="btn btn-danger mx-2" href="/admin">Админ-панель</a>
                    @endif

                    <form method="POST" action="{{ url('logout') }}" class="btn me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Выйти</button>
                    </form>
                    <span class="me-2 text-white">{{ Auth::user()->login }}</span>
                </div>
            @else
                <div class="text-end">
                    <a class="btn btn-outline-light me-2" href="/login">Войти</a>
                    <a class="btn btn-warning" href="/register">Регистрация</a>
                </div>
            @endauth
        </div>
    </div>
</header>

@yield('main_content')

</body>
</html>
