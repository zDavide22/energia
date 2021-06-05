<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if(is_null($request->piva))
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'cognome' => $request->cognome,
                'telefono' => $request->telefono,
                'indirizzo' => $request->indirizzo,
                'citta' => $request->citta,
                'cap' => $request->cap,
                'password' => Hash::make($request->password),
                'ruolo'=>$request->role_id
            ]);
        }else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'cognome' => $request->cognome,
                'telefono' => $request->telefono,
                'indirizzo' => $request->indirizzo,
                'citta' => $request->citta,
                'cap' => $request->cap,
                'password' => Hash::make($request->password),
                'ragSociale' => $request->rags,
                'pIVA' => $request->piva,
                'ruolo'=>$request->role_id
            ]);
        }

        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
