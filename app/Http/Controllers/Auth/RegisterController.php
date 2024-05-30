<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        // Добавление пользователя в БД
        // записываем хеш пароля, в открытом виде не храним
        $user = User::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // аутентификация нового пользователя
        Auth::login($user);

        // перенаправление на домашнюю страницу
        return redirect('/');
    }
}
