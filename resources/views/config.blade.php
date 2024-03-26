@extends('layouts.jogging')

@section('config','設定')
<script src="{{ asset('js/script.js') }}"></script>
<link rel="stylesheet" href="css/config.css">
@section('content')
@section('header')
@endsection
<main id="config">
    <h1 class="page-title">設定</h1>
    <form action="#" method="post">
        <section>
            <h2>[テーマアイコン]テーマ</h2>
            <div class="theme-select">
                <label>
                    <img><!-- 画面サンプル画像(なくても可) -->
                    ライト
                    <input type="radio" name="theme" value="light-theme">
                </label>
            </div>
            <div class="theme-select">
                <label>
                    <img><!-- 画面サンプル画像(なくても可) -->
                    ダーク
                    <input type="radio" name="theme" value="dark-theme">
                </label>
            </div>
        </section>

        <section>
            <h2>[レポートアイコン]レポート</h2>
            出発地
            <select name="origin" class="right-align">
                @foreach ($distance as $distanced)
                <option value="{{ $distanced->ID }}">{{ $distanced->contents }}</option>
                @endforeach
            </select><br>

            (駅間距離)
            <span class="right-align"><!-- 計算したものを表示 --></span><br>

            目的地
            <select name="destination" class="right-align">
                @foreach ($distance as $distanced)
                <option value="{{ $distanced->ID }}">{{ $distanced->contents }}</option>
                @endforeach
            </select><br>

            例に使用する食べ物
            <select name="food" class="right-align">
                @foreach ($calorie as $calories)
                <option value="{{ $calories->ID }}">{{ $calories->contents }}</option>
                @endforeach
            </select><br>

            例に使用する映画
            <select name="movie" class="right-align">
                @foreach ($time as $times)
                <option value="{{ $times->ID }}">{{ $times->contents }}</option>
                @endforeach
            </select>
        </section>

        <section>
            <h2>[アカウントアイコン]アカウント</h2>
            <a class="btn-logout">ログアウト</a>
            <a class="btn-delete">アカウントを削除する</a>
            <span class="txt-red">この操作は取り消せません</span>
        </section>

        <button type="button" class="btn-cancel">キャンセル</button> <!-- 前画面に戻るか、そもそもなくてもいいかも -->
        <button type="submit" class="btn-update">更新</button>
    </form>
</main>
@endsection