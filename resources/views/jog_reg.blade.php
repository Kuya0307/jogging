@extends('layouts.app')

@section('title','ページのタイトル')

@section('content')
    @section('header')
    @endsection

    <h1>新規データ登録</h1>
    <main id="jog_reg">
        <form action="#" method="get">
           <span class="required">日付</span> 
            <input type="date" name="date" required><br>

            場所
            <select name="blood_type">
                <option value="o-place">屋外</option><br>
                <option value="i-place">屋内</option><br>
            </select><br>

            <span class="required">距離</span> 
            <input type="number" step="0.1" name="distance" placeholder="例:12.34" required>km <br>

            時間 <input type="time" name="time" step="1"><br>
            消費カロリー <input type="number" name="kcal" placeholder="例:1234">kcal <br>
            画像 <input type="file" name="files"><br>

            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">登録</button>
        </form>
    </main>
    
@endsection