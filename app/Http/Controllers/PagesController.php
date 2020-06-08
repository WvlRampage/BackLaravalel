<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('users');
    }


}
