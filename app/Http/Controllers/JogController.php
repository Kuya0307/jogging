<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\jogging;

class JogController extends Controller
{
    //ログイン画面
    public function login()
    {
        return view('login');
    }

    public function user_reg()
    {
        return view('user_reg');
    }

    public function month_look()
    {
        return view('month_look');
    }

    public function jog_reg()
    {
        return view('jog_reg');
    }

    public function view()
    {
        return view('view');
    }
    #編集機能
    public function edit($id)
    {
        $jogging = Jogging::find($id);
        return view('edit', ['jogging' => $jogging]);
    }
    #編集機能の作成
    public function edit_function(Request $request)
    {
        $id = $request->input('id');
    }
    public function report()
    {
        return view('report');
    }

    public function config()
    {
        return view('config');
    }
}
