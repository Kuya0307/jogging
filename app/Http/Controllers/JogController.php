<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Jogging;
use Illuminate\Support\Facades\Storage;

class JogController extends Controller
{
    public function user_reg(){
        return view('user_reg');
    }

    public function month_look(){
        $year = date('Y');
        $month = date('n');
        return view('month_look',['year' => $year, 'month' => $month]);
    }

    public function jog_reg(){
        return view('jog_reg');
    }

    public function jog_create(Request $request){
        $this->validate($request,Jogging::$rules,Jogging::$messages);
        //画像があるときパスを保存、ないなら「no image」と保存
        if($request->hasFile('course_img_pass')){
            $file = $request->file('course_img_pass');
            $file_name = $file->getClientOriginalName();
        }else{
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
        $file->storeAs('public',$file_name);
        return redirect('/month_look');//理想は前にいた画面にリダイレクトしたいが、一旦これで。
    }
    public function view(Request $request){
        //日付とユーザで一致
        $jog_data = Jogging::where('user_id',1)->where('date',$request->year.'-'.$request->month.'-'.$request->day)->where('delete_flag','0')->get();
        if(count($jog_data) == 0){
            return redirect('/month_look');
        }
        return view('view',['jog_data'=>$jog_data]);
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
