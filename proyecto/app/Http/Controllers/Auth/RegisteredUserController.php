<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'string', 'max:100'],
            'nombre_usuario' => ['required', 'string', 'max:45'],
            'fecha_nacimiento' => ['required', 'date'],
            'contrasenia' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo'=>$request->correo,
            'nombre_usuario'=>$request->nombre_usuario,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'contrasenia' => Hash::make($request->contrasenia),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
