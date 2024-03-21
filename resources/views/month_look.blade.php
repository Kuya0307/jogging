@extends('layouts.app')

@section('month_look','月別一覧画面')

@section('content')
    @section('header')
    @endsection
    <main id="month_look">
        <div> <!-- カレンダー形式 -->
            <div>
                <a>[前月に移動するアイコン]</a>
                <h1>[年]<span>年</span>[月]<span>月</span></h1> <!-- クリックすると<input type="month">が表示されるようにする(js使用) -->
                <a>[翌月に移動するアイコン]</a>
            </div>
            <div>
                [ここにトグルボタン]
            </div>
            [ここにカレンダー]
        </div>

        <div> <!-- リスト形式 -->
            <div>
                <a>[前月に移動するアイコン]</a>
                <h1>[年]<span>年</span>[月]<span>月</span></h1> <!-- クリックすると<input type="month">が表示されるようにする(js使用) -->
                <a>[翌月に移動するアイコン]</a>
            </div>
            <div>
                <button type="button">[絞り込みアイコン]絞り込み</button>
                [ここにトグルボタン]
            </div>

            <table>
                <thead>
                    <tr>
                        <th>日付[並替アイコン]</th>
                        <th>場所[並替アイコン]</th>
                        <th>距離[並替アイコン]</th>
                        <th>時間[並替アイコン]</th>
                        <th>消費カロリー[並替アイコン]</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>[日付]</td>
                        <td>[場所アイコン]</td>
                        <td>[距離]<span>km</span></td>
                        <td>[時間]</td>
                        <td>[消費カロリー]<span>kcal</span></td>
                        <td>[編集アイコン][削除アイコン]</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection