<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the registration page
     */
    public function index(): View
    {
        return view('register');
    }
    /**
     * Proccess the registration form and add user if everything is ok
     */
    public function register(Request $request): RedirectResponse
    {
        $message = ['status' => 'bg-danger', 'text' => 'An error occurred.'];

        if ($request->isMethod('post')) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $repeat_password = $request->input('repeat_password');

            if ( $repeat_password != $password ) $message = ['status' => 'bg-danger', 'text' => 'Passwords must match.'];
            if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) $message = ['status' => 'bg-danger', 'text' => 'Email is not valid.'];

            $user = new User();

            //Check if there is already a user using thing email address
            $found_user = $user::where('email', $email)->first();
            if (null != $found_user) $message = ['status' => 'bg-danger', 'text' => 'Email already in use.'];
            else {
                //If available add the user to the db

                $user->name = $name;
                $user->email = $email;
                $user->password = $password;
                $done = $user->save();
                if ($done) $message = ['status' => 'bg-success', 'text' => 'User registered successfully.'];
            }

            return redirect('register')->with('message', $message);
        }
        
        return redirect('register')->with('message', $message);
    }
}