<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login() {
        return view('/user/login');
    }


    public function processLogin(Request $request) {
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
            $user = Auth::user();

            // Store the user data in the session
            session(['user' => $user]);
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('message', 'Invalid credentials.');
        }
    
        return back()->withErrors([
            'email' => 'No user found with this email and password.',
        ]);
    }

    public function manageUsers() {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }
}
