<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link bootstrap-->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <!--Start header-->
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="{{asset('logo.png')}}" class="logo" alt="logo">
    <h1><a class="navbar-brand" href="{{route('welcome')}}">Курсы.РФ</a></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        @if(Auth::user()->role==='admin')
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.index')}}">Админ-панель</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('appointments.index')}}">Заявки</a>
        </li>
        @endif
        @endauth
      </ul>
      @guest
      <a class="btn btn-light" href="{{route('register')}}">Регистрация</a>
      <a class="btn btn-light" href="{{route('login')}}">Вход</a>
      @endguest
      @auth
      <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-light">Выход</button>
      </form>
      @endauth
    </div>
  </div>
</nav>
    </header>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="Alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--End header-->
    <!--Start main-->
    @yield('main')
    <!--End main-->
    <!--Start footer-->
    <footer>
       <h3>Наше местонахождение:</h3>
       <p class="footerp">Адрес головного офиса: г. Москва, ул. Большая Ордынка, д. 15</p>
       <p class="footerp">Телефон горячей линии: +7 (495) 123-45-67</p>
       <p class="footerpaccent">Если возникли вопросы или пожелания, позвоните нам. Ответим оперативно
и подробно.</p>
        <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('JS/script.js')}}"></script>
       
    </footer>
    <!--End footer-->
</body>
</html>