@extends('layouts.app')

@section('title','ページのタイトル')

@section('content')
@section('header')
@endsection

<h1>データ編集</h1>
<main id="edit">
    <form action="" {{ route(edit_function) }}"" method="post">
        <span class="required">日付<span>*</span>
            <input type="date" name="date" value="{{ $jogging->date }}" required><br>

            場所
            <select name="place">
                <option value="o-place">屋外</option><br>
                <option value="i-place">屋内</option><br>
            </select><br>

            <span class="required">距離</span>
            <input type="number" step="0.01" name="distance" placeholder="例:12.34" value="{{ $jogging->distance }}" required>km <br>

            時間 <input type="time" name="time" step="1" value="{{ $jogging->jog_time }}"><br>
            消費カロリー <input type="number" name="kcal" placeholder="例:1234" value="{{ $jogging->calorie }}">kcal <br>
            画像 <input type="file" name="files"><br>
            <img src="{{ asset($jogging->course_img_pass) }}" alt="商品画像">
            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">更新</button>
            <input type="hidden" name="id" value="{{ $jogging->id }}">
    </form>
</main>

@endsection