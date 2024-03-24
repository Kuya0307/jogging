@extends('layouts.jogging')

@section('view','情報閲覧')

@section('content')
    @section('header')
    @endsection
    <main id="view">
        @foreach($jog_data as $jog)
        <div class="left-side">
            <img src="{{asset('storage/' . $jog->course_img_pass)}}">
            <a href="#" class="btn btn-back">戻る</a>
        </div>

        <div class="right-side">
            <h1>
                {{$jog->date}}<span class="h1-smaller">の記録</span>
            </h1>
            <table>
                @if($jog->jog_env == 0)
                <tr>
                    <th>場所</th>
                    <td>屋内</td>
                </tr>
                @else
                <tr>
                    <th>場所</th>
                    <td>屋外</td>
                </tr>
                @endif
                <tr>
                    <th>距離</th>
                    <td>{{$jog->distance}}<span>km</span></td>
                </tr>
                <tr>
                    <th>時間</th>
                    <td>{{$jog->jog_time}}</td>
                </tr>
                <tr>
                    <th>消費カロリー</th>
                    <td>{{$jog->calorie}}<span>kcal<span></td>
                </tr>
            </table>
            <div class="button-container">
                <a href="#" class="btn btn-edit">編集</a>
                <a href="#" class="btn btn-delete">削除</a>
            </div>
        </div>
        @endforeach
    </main>
@endsection