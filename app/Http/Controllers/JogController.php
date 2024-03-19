<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogController extends Controller
{
    //ログイン画面
    public function login()
    {
        return view('login');
    }

    public function user_reg(){
        return view('user_reg');
    }

    public function month_look(){
        return view('month_look');
    }

    public function jog_reg(){
        return view('jog_reg');
    }

    public function view(){
        return view('view');
    }

    public function edit(){
        return view('edit');
    }

    public function report(){
        return view('report');
    }

    public function config(){
        return view('config');
    }
}
