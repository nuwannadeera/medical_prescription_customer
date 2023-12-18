<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManagerController extends Controller {

    function login() {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    function goToDashboard() {
        return view('dashboard');
    }

    function registration() {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'))->with("success", "Logged Successfully!");
        }
        return redirect(route('login'))->with("error", "Login Details error!");
    }

    function registrationPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'contactNo' => 'required|unique:users',
            'type' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'contactno' => $request->contactNo,
            'type' => $request->type,
            'dob' => $request->dob,
        ];

        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration error!");
        }
        return redirect(route('login'))->with("success", "Registration success!");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
