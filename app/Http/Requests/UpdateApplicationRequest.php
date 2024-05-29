<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
            'reason' => ['required_if:status,Отклонена'],
            'photo_after' => ['required_if:status,Решена', 'image', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return [
            'reason.required_if' => 'Введите причину отказа',
            'photo_after.required_if' => 'Прикрепите фотографию решеной проблемы',
            'photo_after.image' => 'Файл должен быть изображением',
            'photo_after.max' => 'Файл должен быть меньше :max килобайт',
        ];
    }
}
