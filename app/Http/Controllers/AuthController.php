<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/(.+)@(.+)\.(.+)/i'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('home')->with('success', 'Login System Finance  Berhasil');
        }

        throw ValidationException::withMessages([
            'email' => 'Kredensial ini tidak cocok dengan catatan kami.',
        ]);
    }
}
