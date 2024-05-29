<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required'],
            'tel' => ['required'],
            'login' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'rules' => ['required'],
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Необходимо ввести имя пользователя',
            'tel.required'=> 'Необходимо ввести номер телефона',
            'login.required' =>'Введите логин',
            'email.required' => 'Необходимо ввести email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.required' => 'Необходимо ввести пароль',
            'rules.required' => 'Необходимо дать согласие на обработку персональных данных',
        ];
    }
}
