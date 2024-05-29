@extends('layouts.app')

@section('content')
<h2 class="main__title">
    Изменение статуса заявки
</h2>
<form class="main__form form" action="{{ route('applications.update', $application->id) }}" method="post"
    enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="form__row">
        <label for="title" class="form__label">
            Название
        </label>
        <input type="text" id="title" class="form__input" value="{{ $application->title }}" disabled>
    </div>

    <div class="form__row">
        <label for="status" class="form__label">
            Статус заявки
        </label>
        <select id="status" name="status" class="form__select" size="2">
            <option @if (old('status')=='Решена' ) selected @endif>
                Решена
            </option>
            <option @if (old('status')=='Отклонена' ) selected @endif>
                Отклонена
            </option>
        </select>
    </div>

    <div class="form__row">
        <label for="photo_after" class="form__label">
            Фотография решеной проблемы
        </label>
        <input type="file" id="photo_after" name="photo_after"
            class="form__input @error('photo_after') form__input_error @enderror" accept="image/*">
        @error('photo_after')
        <div class="form__message">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form__row" hidden>
        <label for="reason" class="form__label">
            Причина отказа
        </label>
        <textarea id="reason" name="reason" rows="5" cols="30"
            class="form__input @error('reason') form__input_error @enderror"></textarea>
        @error('reason')
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