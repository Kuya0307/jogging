@extends('layouts.jogging')

@section('month_look','月別一覧')

@section('content')
    @section('header')
    @endsection
    <main id="month_look">
        <div id="calendar-style"> <!-- カレンダー形式 -->
            <div class="month-change">
                <a>[前月に移動するアイコン]</a>
                <h1>[年]<span class="h1-smaller">年</span>[月]<span class="h1-smaller">月</span></h1> <!-- クリックすると<input type="month">が表示されるようにする(js使用) -->
                <a>[翌月に移動するアイコン]</a>
            </div>

            <div class="btn-toggle right-align">
                [ここにトグルボタン]
            </div>

            <div id="month-calendar">
                [ここにカレンダー]
            </div>
        </div>

        <div id="list-style"> <!-- リスト形式 -->
            <div class="month-change">
                <a>[前月に移動するアイコン]</a>
                <h1>[年]<span class="h1-smaller">年</span>[月]<span class="h1-smaller">月</span></h1> <!-- クリックすると<input type="month">が表示されるようにする(js使用) -->
                <a>[翌月に移動するアイコン]</a>
            </div>

            <div class="right-align">
                <button type="btn-filter">
                    [絞り込みアイコン]絞り込み
                </button>
                <div class="btn-toggle">
                    [ここにトグルボタン]
                </div>
            </div>

            <table id="month-list">
                <thead>
                    <tr>
                        <th>日付[並替アイコン]</th>
                        <th>場所[並替アイコン]</th>
                        <th>距離[並替アイコン]</th>
                        <th>時間[並替アイコン]</th>
                        <th>消費カロリー[並替アイコン]</th>
                        <th><!-- 編集・削除アイコン用の列(見出しなし) --></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>[日付]</td>
                        <td>[場所アイコン]</td>
                        <td>[距離]<span class="unit">km</span></td>
                        <td>[時間]</td>
                        <td>[消費カロリー]<span class="unit">kcal</span></td>
                        <td>[編集アイコン][削除アイコン]</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection