@extends('layouts.app')

@section('content')
  {{-- --}}
  <h2 class="main__title">
    Личный кабинет
  </h2>

  <section class="main__panel panel">

    <form class="panel__form form" name="filter">

      <div class="form__row">
        <a href="{{ route('applications.create') }}" class="form__button">
          Заявка
        </a>
      </div>

      {{-- фильтр --}}
      <div class="form__row">
        <label for="filter_status" class="form__label">
          Статус заявки
        </label>
        <select id="filter_status" class="form__select">
          <option>Все статусы</option>
          <option>Новая</option>
          <option>Решена</option>
          <option>Отклонена</option>
        </select>
      </div>

      <div class="form__row">
        <label for="category" class="form__label">
          Категоря заявки
        </label>
        <select id="category" name="category" class="form__select">

          <option value="0">Все категории</option>
          @forelse ($categories as $category)
            <option value="{{ $category->id }}">
              {{ $category->title }}
            </option>
          @empty
            <option disabled selected value="0">
              Категории не добавлены
            </option>
          @endforelse

        </select>
      </div>

    </form>

    <div class="panel__problem problem">
      {{-- проблемы --}}
      <div class="problem__items">

        @forelse ($applications as $application)
          <div class="problem__item" data-status="{{ $application->status }}"
            data-category="{{ $application->category->id }}">
            <div class="problem__image">
              <img src="{{ asset('storage/images/' . $application->photo_before) }}" alt="1">
            </div>
            <h3 class="problem__name"> {{ $application->title }} </h3>
            <p class="problem__category"> {{ $application->category->title }} </p>
            <p class="problem__time"> {{ $application->created_at }} </p>
            <p class="problem__status"> {{ $application->status }} </p>
            @if ($application->status == 'Новая')
              <form action="{{ route('applications.destroy', $application->id) }}" method="post"
                onsubmit="return confirm('Вы хотите удалить заявку?');">
                @csrf
                @method('delete')

                <button type="submit" class="problem__delete">
                  Удалить
                </button>
              </form>
            @else
              <a href="#" class="problem__delete problem__delete_hide">
                Удалить
              </a>
            @endif

          </div>

        @empty
          <div class="panel__form form">
            Нет заявок
          </div>
        @endforelse

      </div>
    </div>

  </section>
@endsection