<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Jogging;
use App\Models\report;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class JogController extends Controller
{
    public function user_reg()
    {
        return view('user_reg');
    }

    public function month_look()
    {
        $year = date('Y');
        $month = date('n');
        return view('month_look', ['year' => $year, 'month' => $month]);
    }

    public function jog_reg()
    {
        return view('jog_reg');
    }

    public function jog_create(Request $request)
    {
        $this->validate($request, Jogging::$rules, Jogging::$messages);
        //画像があるときパスを保存、ないなら「no image」と保存
        if ($request->hasFile('course_img_pass')) {
            $file = $request->file('course_img_pass');
            $file_name = $file->getClientOriginalName();
        } else {
            $file_name = "no image";
        }
        $Jogging = new Jogging;
        $Jogging->user_id = 1;
        $Jogging->date = $request->date;
        $Jogging->jog_env = $request->jog_env;
        $Jogging->distance = $request->distance;
        $Jogging->jog_time = $request->jog_time;
        $Jogging->calorie = $request->calorie;
        $Jogging->delete_flag = 0;
        $Jogging->course_img_pass = $file_name;
        $Jogging->save();
        $file->storeAs('public', $file_name);
        return redirect('/month_look'); //理想は前にいた画面にリダイレクトしたいが、一旦これで。
    }
    public function view(Request $request)
    {
        //日付とユーザで一致
        $jog_data = Jogging::where('user_id', 1)->where('date', $request->year . '-' . $request->month . '-' . $request->day)->where('delete_flag', '0')->get();
        if (count($jog_data) == 0) {
            return redirect('/month_look');
        }
        return view('view', ['jog_data' => $jog_data]);
    }
    #編集機能
    public function edit(Request $request)
    {
        $jogging = Jogging::where('id', $request->id)->first();
        return view('edit', ['jogging' => $jogging]);
    }
    #編集機能の作成
    public function edit_function(Request $request)
    {
        $param = [
            'date' => $request->date,
            'jog_env' => $request->jog_env,
            'distance' => $request->distance,
            'jog_time' => $request->jog_time,
            'calorie' => $request->calorie,
            'course_img_pass' => $request->course_img_pass,
        ];
        Jogging::where('ID', $request->id)->update($param);
        return redirect('/month_look');
    }
    public function report()
    {
        return view('report');
    }

    public function config()
    {
        $distance = Report::where('genre', 0)->get();
        $time = Report::where('genre', 1)->get();
        $calorie = Report::where('genre', 2)->get();
        $user_info = User::with(['startingPoint', 'destination'])->find(1);
        $starting_content = $user_info->startingPoint->con_num ?? 0;
        $destination_content = $user_info->destination->con_num ?? 0;
        $distance_minus_time = $destination_content - $starting_content;

        return view('config', [
            'distance' => $distance,
            'time' => $time,
            'calorie' => $calorie,
            'user' => $user_info,
            'distance_minus_time' => $distance_minus_time
        ]);
    }


    public function config_update(Request $request)
    {
        $param = [
            'Starting_id' => $request->origin,
            'Destination_id' => $request->destination,
            'time_id' => $request->movie,
            'calorie_id' => $request->food,
        ];
        User::where('id', 1)->update($param);
        return redirect('/config');
    }
    public function del_account($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'ユーザーが見つかりませんでした');
        }
        $user->delete();
        return redirect('/login');
    }
}
