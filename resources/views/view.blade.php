@extends('layouts.app')

@section('view','情報閲覧')

@section('content')
    @section('header')
    @endsection
    <main id="view">
        @foreach($jog_data as $jog)
        <div>
        <img src="{{asset('storage/' . $jog->course_img_pass)}}">
            <a>戻る</a>
        </div>

        <div>
            <h1>
                {{$jog->date}}<span>の記録</span>
            </h1>
            @if($jog->jog_env == 0)
                <p>場所<span>屋内</span></p>
            @else
                <p>場所<span>屋外</span></p>
            @endif
            <p>距離<span>{{$jog->distance}}<span>km</span></span></p>
            <p>時間<span>{{$jog->jog_time}}</span></p>
            <p>消費カロリー<span>{{$jog->calorie}}<span>kcal<span></span></p>
            <a class="btn-edit">編集</a>
            <a class="btn-edit">削除</a>
        </div>
        @endforeach
    </main>
@endsection