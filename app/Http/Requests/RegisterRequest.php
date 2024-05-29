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
            'name' => ['required', 'unique:users'],
            'tel' => ['required'],
            'login' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
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
            'name.unique' => 'Пользователь с таким логином уже зарегистрирован',
            'tel.required'=> 'Необходимо ввести номер телефона',
            'login.required' =>'Введите логин',
            'email.required' => 'Необходимо ввести email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.required' => 'Необходимо ввести пароль',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть не менее :min символов',
            'rules.required' => 'Необходимо дать согласие на обработку персональных данных',
        ];
    }
}
