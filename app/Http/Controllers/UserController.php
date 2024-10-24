<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

         //return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function showRegistrationForm(Request $request)
    {
         

          return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
}
public function logout(Request $request) {
    Auth::logout();
    return redirect('/login');
  }

}
