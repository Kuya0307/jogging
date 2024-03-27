@extends('layouts.jogging')

@section('report','レポート')

@section('content')
    @section('header')
    @endsection
    <main id="report">
        <div class="card monthly-distance-card">
            <p>今月の<br>総ジョギング距離</p>
            <div>
                <h2>◯◯</h2>
                <span>を過ぎたところ</span>
            </div>
            <h2>◯<span>km</span></h2>
        </div>  

        <div class="card progress-card">
            目的地まで残り◯%(プログレスバー)
        </div>

        <div class="card monthly-runtime-card">
            <p>今月の<br>総ジョギング時間</p>
            <div>
                <span>[映画タイトル]</span>
                <h2>◯<span>回分</span></h2>
            </div>
            <h2>◯<span>時間</span></h2>
        </div>

        <div class="card monthly-calories-card">
            <p>今月の<br>総消費カロリー</p>
            <div>
                <span>[食品名]</span>
                <h2>◯<span>個分</span></h2>
            </div>
            <h2>◯<span>kcal</span></h2>
        </div>

        <div class="card total-distance-card">
            <p>総ジョギング距離</p>
            <div>
                <span>地球</span>
                <h2>◯<span>周分</span></h2>
            </div>
            <h2>◯<span>km</span></h2>
        </div>

        <div class="card graph-card">
            グラフ
        </div>
    </main>
@endsection