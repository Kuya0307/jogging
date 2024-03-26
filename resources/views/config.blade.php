@extends('layouts.jogging')

@section('config','設定')

@section('content')
    @section('header')
    @endsection
    <main id="config">
        <h1 class="page-title">設定</h1>
        <form action="#" method="post">
            <section>
                <h2 class="title-theme">テーマ</h2>
                <div class="theme-container">
                    <div class="light-theme">
                        <label>
                            <img src="#"><br>
                            ライト<br>
                            <input type="radio" name="theme" value="light-theme">
                        </label>
                    </div>
                    <div class="dark-theme">
                        <label>
                            <img src="#"><br>
                            ダーク<br>
                            <input type="radio" name="theme" value="dark-theme">
                        </label>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="title-report">レポート</h2>
                <table>
                    <tr>
                        <th>出発地</th>
                        <td>
                            <select name="origin">
                                <option value="morioka">盛岡, 岩手県</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>(駅間距離)</th>
                        <td>
                            <span>(計算したものを表示)</span>
                        </td>
                    </tr>
                    <tr>
                        <th>目的地</th>
                        <td>
                            <select name="destination" class="right-align">
                                <option value="sendai">仙台, 宮城県</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>例に使用する映画</th>
                        <td>
                            <select name="movie" class="right-align">
                                <option value="titanic">タイタニック(3時間15分)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>例に使用する食べ物</th>
                        <td>
                            <select name="food" class="right-align">
                                <option value="humberger">ハンバーガー(300kcal)</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </section>

            <section>
                <h2 class="title-account">アカウント</h2>
                <a href="#" class="btn btn-logout">ログアウト</a><br>
                <a href="#" class="btn btn-delete">アカウントを削除する</a><br>
                <span class="txt-red">この操作は取り消せません</span>
            </section>

            <div class="button-container">
                <button type="button" class="btn btn-cancel">キャンセル</button> <!-- 前画面に戻るか、そもそもなくてもいいかも -->
                <button type="submit" class="btn btn-update">更新</button>
            </div>

            </form>
    </main>
@endsection