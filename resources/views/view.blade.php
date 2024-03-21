@extends('layouts.app')

@section('view','情報閲覧')

@section('content')
    @section('header')
    @endsection
    <main id="view">
        <div>
            <div class="img-container">
                <!-- 写真がある場合は写真を表示、なければ「No Image」と書く -->
            </div>
            <a class="btn-back">戻る</a>
        </div>

        <div>
            <h1>
                [日付]<span class="h1-smaller">の記録</span>
            </h1>
            <p>
                場所
                <span class="right-align">[屋外/屋内]</span>
            </p>
            <p>
                距離
                <span class="right-align">[]<span class="unit">km</span></span>
            </p>
            <p>
                時間
                <span class="right-align">[]</span>
            </p>
            <p>
                消費カロリー<span class="right-align">[]<span class="unit">kcal<span></span>
            </p>
            <a class="btn-edit">編集</a>
            <a class="btn-delete">削除</a>
        </div>
    </main>
@endsection