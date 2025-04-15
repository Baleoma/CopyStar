<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerindex(Request $request){
        return view('registration');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'surname' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'patronymic' => 'nullable|string|max:50',
            'login' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/')->with('success', 'Регистрация прошла успешно!');
    }

    public function loginindex(Request $request){
        return view('login');
    }

    public function login(Request $request){    $validated = $request->validate([
        'login' => 'required|string|max:255',
        'password' => 'required|string|min:6',
    ]);

        $credentials = [
            'login' => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль',
        ])->onlyInput('login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->intended('/');
    }
}
