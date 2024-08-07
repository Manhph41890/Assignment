<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function showFormLogin()
    {
        return view('client.login');
    }

    public function handleLogin()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            /**
             * @var User $user
             */
            $user = Auth::user();
            if ($user->isMember()) {
                return redirect()->route('index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showFormRegister()
    {
        return view('client.register');
    }

    public function handleRegister()
    {
        $data = request()->validate([
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::query()->create($data);
        // dd($data);
        Auth::login($user);

        request()->session()->regenerate();

        return redirect()->route('index');
    }

    public function handleLogout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
