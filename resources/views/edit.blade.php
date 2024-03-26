@extends('layouts.jogging')

@section('title','ページのタイトル')
<link rel="stylesheet" href="css/jog_form.css">

@section('content')
@section('header')
@endsection

<h1>データ編集</h1>
<main id="edit">
    <form method="POST" action="{{ route('edit_function') }}">
        @csrf
        <table>
                <tr>
                    <th> 日付 <span>*</span></th>
                    <td><input type="date" name="date" required><br></td>
                </tr>
                <tr>
                    <th> 場所 </th>
                    <td>
                        <select name="place">
                            <option value="o-place">屋外</option><br>
                            <option value="i-place">屋内</option><br>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <th> 距離 <span>*</span></th>
                    <td><input type="number" step="0.1" name="distance" placeholder="例:12.34" required>km<br></td>
                </tr>
                <tr>
                    <th> 時間  </th>
                    <td><input type="time" name="time"  step="1"><br></td>
                </tr>
                <tr>
                    <th> 消費カロリー </th>
                    <td><input type="number" name="kcal" placeholder="例:1234">kcal <br></td>
                </tr> 
                <tr>
                    <th> 画像  </th>
                    <td><input type="file" name="files">
                    <img src="{{ asset($jogging->course_img_pass) }}" alt="コース画像">
                    </td>

                </tr>
            </table>
      



            <input type="hidden" name="id" value="{{ $jogging->ID }}">
            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">更新</button>
    </form>
</main>

@endsection