@extends('layouts.app')

@section('content')
  <!--Форма регистрации-->

  <form class="main__form form" action="{{ route('applications.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form__row">
      <label for="title" class="form__label">
        Название
      </label>
      <input type="text" id="title" name="title" class="form__input @error('title') form__input_error @enderror">
      @error('title')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="description" class="form__label">
        Описание
      </label>
      <textarea id="description" name="description" rows="5" cols="30"
        class="form__input @error('description') form__input_error @enderror"></textarea>
      @error('description')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form__row">
      <label for="category_id" class="form__label">
        Категоря заявки
      </label>
      <select id="category_id" name="category_id" class="form__select">

        @forelse ($categories as $category)
          <option value="{{ $category->id }}">
            {{ $category->title }}
          </option>
        @empty
          <option disabled selected value="0">
            Категории не добавлены
          </option>
        @endforelse
    </div>

    <div class="form__row">
      <label for="type" class="form__label">
        Тип
      </label>
      <select name="type" class="form__select">
        <option value="1">Новая</option>
        <option value="2">Б/У</option>
      </select>
    </div>
    <div class="form__row">
      <input type="number" id="price" name="price" class="form__input @error('price') form__input_error @enderror"
        placeholder="Цена">
      @error('price')
        <div class="form__message">
          {{ $message }}
        </div>
      @enderror
    </div>

    <label for="photo_before" class="form__label">
      Фотография проблемы
    </label>
    <input type="file" id="photo_before" name="photo_before"
      class="form__input @error('photo_before') form__input_error @enderror" accept="image/*">
    @error('photo_before')
      <div class="form__message">
        {{ $message }}
      </div>
    @enderror
    </div>

    <button type="submit" class="form__button">
      Сохранить
    </button>
    <a href="{{ route('applications.index') }}" class="form__button">
      Отмена
    </a>

  </form>
@endsection
