<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth/login');
    }

    // Manejar el proceso de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('main');
        }

        return back()->withErrors([
            'email_usuario'=> 'Credenciales incorrectas'
        ]);
    }

    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    // Manejar el proceso de registro
    public function register(Request $request)
    {
        // Aquí puedes agregar la lógica para registrar un nuevo usuario
        // Por ejemplo:
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        // Auth::login($user);

        return redirect('/');
    }
}
