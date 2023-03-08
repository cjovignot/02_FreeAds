<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;


class UserController extends Controller
{
    public function userDisplay()
    {
        $users = Users::all();


        return view('welcome')->with('users', $users);
    }
}
