<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // форма
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Обработка попыток аутентификации.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('applications.index');
            }
            if (Auth::user()->role == 'user') {
                return redirect()->route('applications.index');
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'login' => 'Пользователя с таким логином\паролем не существует',
        ])->onlyInput('name');
    }
}
