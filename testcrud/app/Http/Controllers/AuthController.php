<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AuthController extends Controller
{
    public function loginUser(LoginRequest $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))){
            // Verifica si el usuario está autorizado
            $user = Auth::user();
            if ($user->authorized) {
                // Si está autorizado, redirige a la página principal
                return redirect()->route('index')->with('success', 'Login successful!');
            } else {
                // Cierra sesión si el usuario no está autorizado y muestra un error
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Your account is not authorized.',
                ])->onlyInput('email');
            }
        }

        // Si la autenticación falla, regresa con un mensaje de error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function userLogout() : RedirectResponse {
       Auth::logout();
       return redirect()->route('welcome')->with('success', 'Your Session has been finished');
    }
}