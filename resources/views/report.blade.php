@extends('layouts.app')

@section('title','ページのタイトル')

@section('content')
    @section('header')
    @endsection

<main id="report">

<div style="position: relative;">
<img src="#" alt="写真">
<div style="position: absolute; top: 0px; left: 2px; width: 200px;">
<p>今月の総ジョギング距離</p>
<p>[都市・地区名]</p>
<p>[]km</p>
</div>
</div>

<div><label for="progress">目的地まで残り[]% progress</label></div>

<div style="position: relative;">
<img src="#" alt="写真">
<div style="position: absolute; top: 0px; left: 2px; width: 200px;">
<p>今月の総ジョギング時間</p>
<p>[映画名]</p>
<p>[]回分</p>
<p>[]時間</p>
</div>
</div>

<div style="position: relative;">
<img src="#" alt="写真">
<div style="position: absolute; top: 0px; left: 2px; width: 200px;">
<p>今月の総カロリー</p>
<p>ハンバーガー</p>
<p>[]個分</p>
<p>[]kcal</p>
</div>
</div>

<div style="position: relative;">
<img src="#" alt="写真">
<div style="position: absolute; top: 0px; left: 2px; width: 200px;">
<p>今月の総ジョギング距離</p>
<p>地球</p>
<p>[]周分</p>
<p>[]km</p>
</div>
</div>

<div>line graph↓</div>
</main>

@endsection