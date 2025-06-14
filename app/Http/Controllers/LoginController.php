<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login page
     */
    public function index(): View
    {

        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],

            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $request->session()->put('id_user', Auth::id());

            return redirect('/')->with('message', ['status' => 'bg-success', 'text' => 'You have logged in successfully.']);

        }


        return back()->withErrors([

            'email' => 'The provided credentials do not match our records.',

        ])->onlyInput('email');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}