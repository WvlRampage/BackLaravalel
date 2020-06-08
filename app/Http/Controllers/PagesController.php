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


}
