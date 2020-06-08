<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function posts(){
        return view('posts');
    }

    public function comments(){
        return view('comments');
    }

    public function users(){
        $users = App\User::all();
        return view('users', compact('users'));
    }

    public function detail($id){

        $user = App\User::findOrFail($id);

        return view('users.detail', compact('user'));
    }

    public function create(Request $request){
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        $newUser = new App\User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->save();

        return back()->with('mensaje', 'Usuario Agregado!');
    }

    public function edit($id){
        $user = App\User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $userUpdate = App\User::findOrFail($id);
        $userUpdate->name = $request->name;
        $userUpdate->email = $request->email;

        $userUpdate->save();

        return back()->with('mensaje', 'usuario actualizado');
    }

    public function delete($id){

        $userDelete = App\User::findOrFail($id);
        $userDelete->delete();
    
        return back()->with('mensaje', 'Usuario Eliminado');
    }

}
