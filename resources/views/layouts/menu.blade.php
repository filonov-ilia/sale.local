{{-- не авторизованный пользователь --}}
@guest
  <li>
    <a href="{{ route('register') }}" class="header__link">
      Регистрация
    </a>
  </li>
  <li>
    <a href="{{ route('login') }}" class="header__link">
      Авторизация
    </a>
  </li>
@endguest

{{-- авторизованный пользователь --}}
@auth
  <li>
    <a class="header__link header__link_active">
      {{ Auth::user()->name }}
    </a>
  </li>
  {{-- администратор --}}
  @can('admin')
  @endcan

  {{-- пользователь --}}
  @can('user')
  @endcan

  {{-- кнопка выход --}}
  <form action="{{ route('logout') }}" method="post">
    @csrf

    <button type="submit" class="header__link">
      Выход
    </button>
  </form>
@endauth
