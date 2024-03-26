<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login() {
        return view('/user/login');
    }

    public function processLogin(Request $request) {
     {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $userExists = User::where('email', $request->email)->exists();

    if (!$userExists) {
        return back()->withErrors([
            'email' => 'Cannot find the email address.',
        ]);
    }

    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect()->intended('index');
    }

    return back()->withErrors([
        'email' => 'No user found with this email and password.',
    ]);
    }

//     public function processLogin(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $userExists = User::where('email', $request->email)->exists();

//     if (!$userExists) {
//         return back()->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ]);
//     }

//     if (Auth::attempt($request->only('email', 'password'))) {
//         return redirect()->intended('dashboard');
//     }

//     return back()->withErrors([
//         'email' => 'The provided credentials do not match our records.',
//     ]);
// }

    }
}
