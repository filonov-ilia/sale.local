@extends('layouts.app')

@section('content')
  <!--Форма Категории заявок-->
  <form class="main__form form" action="{{ route('categories.store') }}" method="post">
    @csrf

    <div class="form__row">
      <label for="title" class="form__label">
        Название категории
      </label>
      <input type="text" id="title" name="title" class="form__input @error('title') form__input_error @enderror"
        value="{{ old('title') }}">
      @error('title')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="form__button">
      Добавить
    </button>
    <a href="{{ route('applications.index') }}" class="form__button">
      Отмена
    </a>

  </form>

  <div class="main__category category">
    <ul class="category__items">

      @forelse ($categories as $category)
        <li class="category__item">

          <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline">
            @csrf
            @method('delete')

            <button type="submit" class="form__button form__button_destroy">
              X
            </button>
          </form>

          {{ $category->title }}
        </li>
      @empty
        <li class="category__item">
          Категории не добавлены
        </li>
      @endforelse

    </ul>
  </div>
@endsection
