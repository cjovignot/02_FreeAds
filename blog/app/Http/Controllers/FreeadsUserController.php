<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class FreeadsUserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return view('FreeadsUser.index', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    * ATTENTION IL VA FALLOIR PEUT ETRE LE REDIRIGER VERS REGISTRATION
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        return view('FreeadsUser.create');
    }


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['admin'] = '0';

        
        User::create($request->post());
        // $user = User::create($data);
        // if(!$user) {

        //     return redirect(route('registration'))->with("error", "Registration failed, try again.");
        // }

        //return redirect(route('login'))->with("success", "Registration success, login to access the app");



        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }


    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        return view('FreeadsUser.show',compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        return view('FreeadsUser.edit',compact('user'));
    }

     /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
           // 'address' => 'required',
        ]);


    $user->fill($request->post())->save();

    return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }


      /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }
}