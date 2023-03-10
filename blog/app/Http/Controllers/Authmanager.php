<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Authmanager extends Controller
{
    public function index() {

        $users = User::all();
       // $title = 'Mon super titre';
       // return view('articles', compact ('title')); compact envoie le title qu'on peut recuperer ds une vue avec {$title{}}
       // return view('articles')-> with('title', $title); mm chose qu'au dessu

       return view('articles', [
       'posts' => $posts
   ]);
   }
    
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
            'password' => 'required',
            'passwordverify' => 'required',
            'phone_number' => 'required'
            
        ]);

       
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['phone_number'] = $request->phone_number;
        $data['admin'] = '0';


        $user = User::create($data);

        event(new Registered($user));


        if(!$user) {

            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }

        return redirect(route('login'))->with('success', 'Your account has been created. Please check your email to verify your account.');
    }

    public function logout() {
        $session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}


// use Illuminate\Auth\Events\Registered;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class RegisterController extends Controller
// {
//     public function create(Request $request)
//     {
//         $user = User::create([
//             'name' => $request->input('name'),
//             'email' => $request->input('email'),
//             'password' => Hash::make($request->input('password')),
//         ]);

//         event(new Registered($user));

//         return redirect('/login')->with('success', 'Your account has been created. Please check your email to verify your account.');
//     }
// }
