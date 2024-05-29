@extends('layouts.app')

@section('content')
  <!--Форма регистрации-->
  <h2 class="main__title">Регистрация</h2>
  <form class="main__form form" action="{{ route('register') }}" method="post">
    @csrf

    <div class="form__row">
      <label for="fio" class="form__label">
        ФИО
      </label>
      <input type="text" id="fio" name="fio" class="form__input @error('fio') form__input_error @enderror"
        value="{{ old('fio') }}">
      @error('fio')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="tel" class="form__label">
        Телефон
      </label>
      <input type="number" id="tel" name="name" class="form__input @error('tel') form__input_error @enderror"
        value="{{ old('tel') }}">
      @error('tel')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="login" class="form__label">
        Логин
      </label>
      <input type="text" id="login" name="login" class="form__input @error('login') form__input_error @enderror"
        value="{{ old('login') }}">
      @error('login')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="email" class="form__label">
        E-mail
      </label>
      <input type="email" id="email" name="email" class="form__input @error('email') form__input_error @enderror"
        value="{{ old('email') }}">
      @error('email')
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
      <label for="password_confirmation" class="form__label">
        Подтвердить пароль
      </label>
      <input type="password" id="password_confirmation" name="password_confirmation"
        class="form__input @error('password') form__input_error @enderror">
      @error('password')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="rules" class="form__label">
        <input type="checkbox" id="rules" name="rules"
          class="form__checkbox @error('rules') form__input_error @enderror" @if (old('rules') == 'on')  @endif>
        Согласие на обработку персональных данных
      </label>
      @error('rules')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="form__button">Зарегистрироваться</button>
  </form>
@endsection
