<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('users.index', compact('users'));
}

public function create()
{
    return view('users.create');
}

public function store(Request $request)
{   
    

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'rol' => 'required',
        'password' => 'required|confirmed',
      ]);
      
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->rol = $request->input('rol');
      $user->password = bcrypt($request->input('password'));
      $user->save();
      
      return redirect('/users')->with('success', 'El usuario ha sido registrado correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
         return view('users.edit')->with('user',$user);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        
    
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->rol = $request->input('rol');
    $user->password = bcrypt($request->input('password'));
    $user->save();

    return redirect('/users');
    }
    

    public function destroy(string $id)
    {
        $user = User::find($id);        
        $user->delete();

        return redirect('/users');
    }

}
