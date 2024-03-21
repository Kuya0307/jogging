@extends('layouts.app')

@section('title','ページのタイトル')

@section('content')
    @section('header')
    @endsection

    <h1>新規データ登録</h1>
    <main id="jog_reg">
        @if(count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="jog_create" method="post" enctype="multipart/form-data">
            @csrf
           <span class="required">日付*</span> 
            <input type="date" name="date"><br>

            場所
            <select name="jog_env">
                <option value="1">屋外</option><br>
                <option value="0">屋内</option><br>
            </select><br>


            <span class="required">距離*</span> 
            <input type="number" step="0.01" name="distance" placeholder="例:12.34">km <br>

            時間 <input type="time" name="jog_time" step="1"><br>
            消費カロリー <input type="number" name="calorie" placeholder="例:1234">kcal <br>
            画像 <input type="file" name="course_img_pass" accept="image/png, image/jpeg"><br>

            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">登録</button>
        </form>
    </main>
    
@endsection