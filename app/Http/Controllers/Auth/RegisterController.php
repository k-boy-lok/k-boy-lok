<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    //
    public function show()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('auth.login')->with('success', "Account successfully registered.");
    }
}
