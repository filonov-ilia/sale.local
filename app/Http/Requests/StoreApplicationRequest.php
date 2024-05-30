<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'photo_before' => ['required', 'image', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Введите название заявки',
            'description.required' => 'Введите описание заявки',
            'category_id.required' => 'Выберите категорию заявки',
            'photo_before.required' => 'Прикрепите фотографию проблемы',
            'photo_before.image' => 'Файл должен быть изображением',
            'photo_before.max' => 'Файл должен быть меньше :max килобайт',
        ];
    }
}
