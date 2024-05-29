<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Sale</title>

  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="container">

  <header class="header">
    <a href="{{ route('welcome') }}" class="header__logo">
      <img src="{{ asset('images/logo.png') }}" alt="Sale" height="80px">
    </a>
    <nav class="header__menu">
      <ul class="header__list">
        @include('layouts.menu')
      </ul>
    </nav>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer class="footer">
    <div class="footer__copy">
      &copy; Sale, 2024
    </div>
  </footer>

</body>

</html>
