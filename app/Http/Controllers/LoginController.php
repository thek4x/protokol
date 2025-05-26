<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index()
    {
        if (auth()->check()) {            
            return redirect()->route('frontend.index');
        }

        return view('login.index');
    }

    public function login(LoginRequest $request)
    {
        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Redirect to the intended page or home
            return response()->json([
                'redirect' => route('frontend.index')
            ], 200);
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
