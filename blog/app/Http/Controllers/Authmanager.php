<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Authmanager extends Controller
{
    public function login() {

        return view('login');
    }

    public function registration() {

        return view('registration');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {

            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "login details are not valid");
    }

    public function registrationPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

       
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user) {

            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }

        return redirect(route('login'))->with("success", "Registration success, login to access the app");

    }

    public function logout() {
        $session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
