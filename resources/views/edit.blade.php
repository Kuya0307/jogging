@extends('layouts.jogging')

@section('title','ページのタイトル')

@section('content')
    @section('header')
    @endsection

    <h1>データ編集</h1>
    <main id="edit">
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
            <button class="btn-primary" type="submit">更新</button>
        </form>
    </main>
@endsection

<h1>データ編集</h1>
<main id="edit">
    <form method="POST" action="{{ route('edit_function') }}">
        @csrf
        <span class="required">日付<span>*</span>
            <input type="date" name="date" value="{{ $jogging->date }}" required><br>

            場所
            <select name="jog_env">
                <option value="1" {{ $jogging->jog_env == 1 ? 'selected' : '' }}>屋外</option>
                <option value="0" {{ $jogging->jog_env == 0 ? 'selected' : '' }}>屋内</option>
            </select>

            <span class="required">距離</span>
            <input type="number" step="0.01" name="distance" placeholder="例:12.34" value="{{ $jogging->distance }}" required>km <br>

            時間 <input type="time" name="jog_time" step="1" value="{{ $jogging->jog_time }}"><br>
            消費カロリー <input type="number" name="calorie" placeholder="例:1234" value="{{ $jogging->calorie }}">kcal <br>
            画像 <input type="file" name="files"><br>
            <img src="{{ asset($jogging->course_img_pass) }}" alt="コース画像">
            <input type="hidden" name="id" value="{{ $jogging->ID }}">
            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">更新</button>
    </form>
</main>

@endsection