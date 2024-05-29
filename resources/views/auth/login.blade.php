@extends('layouts.app')

@section('content')
  <!--Форма регистрации-->
  <h2 class="main__title">Авторизация</h2>
  <form class="main__form form" action="{{ route('login') }}" method="post">
    @csrf

    <div class="form__row">
      <label for="name" class="form__label">
        Логин
      </label>
      <input type="text" id="name" name="name" class="form__input @error('name') form__input_error @enderror"
        value="{{ old('name') }}">
      @error('name')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="password" class="form__label">
        Пароль
      </label>
      <input type="password" id="password" name="password"
        class="form__input @error('password') form__input_error @enderror">
      @error('password')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="remember" class="form__label">
        <input type="checkbox" id="remember" name="remember" class="form__checkbox" checked>
        Запомнить меня
      </label>
    </div>

    <button type="submit" class="form__button">
      Войти
    </button>

  </form>
@endsection
