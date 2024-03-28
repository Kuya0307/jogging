@extends('layouts.jogging')

@section('month_look','月別一覧')

@section('content')
    @section('header')
    @endsection
    <main id="month_look">
        <!-- <button id="button1">カレンダー表示</button>
        <button id="button2">リスト表示</button> -->
        <div class="mt-ios"> 
            <input id="1" type="checkbox" />
            <label for="1"></label>
        </div>
    <div id="content1" class="content">
        <div id="calendar"></div>
    </div>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
            cursor: pointer;
        }
        th {
            background-color: #f2f2f2;
        }
        .month_title{
            display:flex;
        }
        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
        }
        #list_headline{
            font-size:2rem;
            margin:0;
        }
        #cal_headline{
            font-size:2rem;
            margin:0;
        }
        .material-symbols-outlined{
            font-size:2.5rem
        }
        #ListHeader{
            margin:0;
        }
        .list_table{
            display:flex;
        }
    </style>

<script>
    let currentYear = {{ $year }};
    let currentMonth = {{ $month }};

    function generateCalendar(year, month) {
        const calendarDiv = document.getElementById('calendar');
        const date = new Date(year, month - 1, 1);
        const daysInMonth = new Date(year, month, 0).getDate();
        const firstDayIndex = date.getDay();
        
        const monthNames = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];
        
        let cal_table = '<div class="month_title"><a onclick=previous_month()><span class="material-symbols-outlined">chevron_left</span></a><h2 id="cal_headline">'  + year + '年' + ' ' + monthNames[month - 1] + '</h2><a onclick=next_month()><span class="material-symbols-outlined">chevron_right</span></a></div>';
        cal_table += '<table><tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr><tr>';
        
        let day = 1;
        for (let i = 0; i < 42; i++) {
            if (i === firstDayIndex + daysInMonth) {
                break;
            }
            if (i < firstDayIndex || day > daysInMonth) {
                cal_table += '<td></td>';
            } else {
                cal_table += '<td><a href="/view?year=' + year + '&month=' + month + '&day=' + day + '">' + day + '</a></td>';
                day++;
            }
            if (i % 7 === 6) {
                cal_table += '</tr><tr>';
            }
        }
        
        cal_table += '</tr></table>';
        calendarDiv.innerHTML = cal_table;
    }

    // カレンダーの生成
    generateCalendar(currentYear, currentMonth);

    // 前月へ
    function previous_month() {
        if (currentMonth === 1) {
            currentYear--;
            currentMonth = 12;
        } else {
            currentMonth--;
        }
        generateCalendar(currentYear, currentMonth);
    }

    function next_month() {
        if (currentMonth === 12) {
            currentYear++;
            currentMonth = 1;
        } else {
            currentMonth++;
        }
        generateCalendar(currentYear, currentMonth);
    }
</script>





<div id="content2" class="content" style="display: none;"> <!-- リスト形式 -->
    <div>
        <h3 id="ListHeader"></h3>
    </div>
    <div>
        <button type="button">[絞り込みアイコン]絞り込み</button>
        <!-- ここにトグルボタン -->
    </div>

    <table>
        <thead>
            <tr>
                <th><div class="list_table">日付<a class="sort_date" id="sort_date_down"><span class="material-symbols-outlined" >arrow_drop_down</span></a><a class="sort_date" style="display: none;"  id="sort_date_up"><span class="material-symbols-outlined" >arrow_drop_up</span></a></div></th>
                <th><div class="list_table">場所<a class="sort_place" id="sort_place_down"><span class="material-symbols-outlined" >arrow_drop_down</span></a><a class="sort_place" style="display: none;"  id="sort_place_up"><span class="material-symbols-outlined" >arrow_drop_up</span></a></div></th>
                <th><div class="list_table">距離<a class="sort_distance" id="sort_distance_down"><span class="material-symbols-outlined" >arrow_drop_down</span></a><a class="sort_distance" style="display: none;"  id="sort_distance_up"><span class="material-symbols-outlined" >arrow_drop_up</span></a></div></th>
                <th><div class="list_table">時間<a class="sort_time" id="sort_time_down"><span class="material-symbols-outlined" >arrow_drop_down</span></a><a class="sort_time" style="display: none;"  id="sort_time_up"><span class="material-symbols-outlined" >arrow_drop_up</span></a></div></th>
                <th><div class="list_table">消費カロリー<a class="sort_calorie" id="sort_calorie_down"><span class="material-symbols-outlined" >arrow_drop_down</span></a><a class="sort_calorie" style="display: none;"  id="sort_calorie_up"><span class="material-symbols-outlined" >arrow_drop_up</span></a></div></th>
                <th></th>
            </tr>
        </thead>

        <tbody id="calendarBody">
            <!-- カレンダーデータがここに挿入される -->
        </tbody>
    </table>
</div>

<script>
    let currentYear_list = {{ $year }};
    let currentMonth_list = {{ $month }};
    let up_date_bool = false;
    let down_date_bool = false
    function generateList(year, month) {
        currentYear_list = year;
        currentMonth_list = month;

        const calendarHeader = document.getElementById('ListHeader');
        const calendarBody = document.getElementById('calendarBody');
        const date = new Date(year, month - 1, 1);
        const daysInMonth = new Date(year, month, 0).getDate();
        const firstDayIndex = date.getDay();

        const monthNames = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];

        ListHeader.innerHTML = '<div class="month_title"><a onclick="previous_month_list()"><span class="material-symbols-outlined">chevron_left</span></a>' +
                                    '<h2 id="list_headline">' + year + '年' + ' ' + monthNames[month - 1] + '</h2>' +
                                    '<a onclick="next_month_list()"><span class="material-symbols-outlined">chevron_right</span></a></div>';

        let list_table = ''; // テーブルを初期化
        let day = 1;
        let jogData = @json($jog_data);

        // 日付ごとにソートされたデータを生成
        let sortedData = [];
        for (let i = 0; i < 42; i++) {
            if (i === firstDayIndex + daysInMonth) {
                break;
            }

            jogData.forEach(jog => {
                let jogDate = new Date(jog.date);
                let jogYear = jogDate.getFullYear();
                let jogMonth = jogDate.getMonth() + 1; // 月は0から11で表されるため、1を加える
                let jogDay = jogDate.getDate();
                if (year === jogYear && month === jogMonth && day === jogDay) {
                    sortedData.push(jog);
                }
            });
            day++;
        }
        //日付のソート
    var sort_date = document.getElementsByClassName('sort_date');
    var sort_date_down = document.getElementById('sort_date_down');
    var sort_date_up = document.getElementById('sort_date_up');
    // sort_date の各要素に対してループ処理でイベントを追加する
    for (var i = 0; i < sort_date.length; i++) {
    sort_date[i].addEventListener('click', function() {
        // 昇順の場合
        if (document.getElementById('sort_date_down').style.display !== "none") {
            document.getElementById('sort_date_down').style.display = "none";
            document.getElementById('sort_date_up').style.display = "block";
            up_date_bool = true;
            down_date_bool = false;
        // 降順の場合
        } else if (document.getElementById('sort_date_up').style.display !== "none") {
            document.getElementById('sort_date_down').style.display = "block";
            document.getElementById('sort_date_up').style.display = "none";
            down_date_bool = true;
            up_date_bool = false;
        }
        // ソート処理の実行
        sortJogData(sortedData);
    });
}

// ジョギングデータのソートを行う関数
function sortJogData(sortedData) {
    if (up_date_bool) {
        console.log("昇順ソートの関数" + up_date_bool);
        sortedData.sort((a, b) => {
        console.log("昇順ソートの関数" + up_date_bool);
            const dateA = new Date(a.date);
            const dateB = new Date(b.date);
            return dateA - dateB;
        });
    } else if (down_date_bool) {
        console.log("降順ソートの関数" + down_date_bool);
        sortedData.sort((a, b) => {
        console.log("降順ソートの関数" + down_date_bool);
            const dateA = new Date(a.date);
            const dateB = new Date(b.date);
            return dateB - dateA;
        });
    }
}

        // // 距離で昇順にソート(a - bで昇順、b - aで降順)
        // sortedData.sort((a, b) => a.distance - b.distance);
        // // 距離で降順にソート(a - bで昇順、b - aで降順)
        // sortedData.sort((a, b) => b.distance - a.distance);
        // //カロリーで昇順にソート
        // sortedData.sort((a, b) => a.calorie - b.calorie);
        // //カロリーで降順にソート
        // sortedData.sort((a, b) => b.calorie - a.calorie);
        // // 時間で昇順にソート
        // sortedData.sort((a, b) => {
        //     const timeA = convertTimeToSeconds(a.jog_time);
        //     const timeB = convertTimeToSeconds(b.jog_time);
        //     return timeA - timeB;
        // });
        // // 時間で降順にソート
        // sortedData.sort((a, b) => {
        //     const timeA = convertTimeToSeconds(a.jog_time);
        //     const timeB = convertTimeToSeconds(b.jog_time);
        //     return timeB - timeA;
        // });
        // // 時間を秒に変換
        // function convertTimeToSeconds(time) {
        //     const [hours, minutes, seconds] = time.split(':');
        //     return (parseInt(hours) * 3600) + (parseInt(minutes) * 60) + parseInt(seconds);
        // }
        // ソートされたデータを表示
        sortedData.forEach(jog => {
            let jogDate = new Date(jog.date);
            let jogYear = jogDate.getFullYear();
            let jogMonth = jogDate.getMonth() + 1; // 月は0から11で表されるため、1を加える
            let jogDay = jogDate.getDate();
            let locationIcon = (jog.jog_env === 0) ? '[室内アイコン]' : '[室外アイコン]';
            list_table += '<tr><td><a href="/view?year=' + jogYear + '&month=' + jogMonth + '&day=' + jogDay + '">' + jogYear + '/' + jogMonth + '/' + jogDay + '</a></td>' +
                '<td>' + locationIcon + '</td>' +
                '<td>' + jog.distance + '<span>km</span></td>' +
                '<td>' + jog.jog_time + '</td>' +
                '<td>' + jog.calorie + '<span>kcal</span></td>' +
                '<td>[編集アイコン][削除アイコン]</td></tr>';
        });

        calendarBody.innerHTML = list_table; // テーブルをHTMLに設定
    }

    // 初期表示
    generateList(currentYear_list, currentMonth_list);

    // 前月へ
    function previous_month_list() {
        if (currentMonth_list === 1) {
            currentYear_list--;
            currentMonth_list = 12;
        } else {
            currentMonth_list--;
        }
        generateList(currentYear_list, currentMonth_list);
    }

    // 翌月へ
    function next_month_list() {
        if (currentMonth_list === 12) {
            currentYear_list++;
            currentMonth_list = 1;
        } else {
            currentMonth_list++;
        }
        generateList(currentYear_list, currentMonth_list);
    }

    // ボタンの要素を取得
    var button = document.getElementById("1");
    // カレンダー表示のためのコンテンツ要素を取得
    var content1 = document.getElementById("content1");
    // リスト表示のためのコンテンツ要素を取得
    var content2 = document.getElementById("content2");
    // ボタンがクリックされたときの動作を設定
    button.onclick = function() {
        // カレンダー表示の場合
        if (content1.style.display !== "none") {
            content1.style.display = "none"; // カレンダー非表示
            content2.style.display = "block"; // リスト表示
            button.textContent = "カレンダー表示"; // ボタンのテキストを変更
        } 
        // リスト表示の場合
        else {
            content1.style.display = "block"; // カレンダー表示
            content2.style.display = "none"; // リスト非表示
            button.textContent = "リスト表示"; // ボタンのテキストを変更
        }
    };
    //場所のソート
    var sort_date = document.getElementsByClassName('sort_place');
    var sort_date_down = document.getElementById('sort_place_down');
    var sort_date_up = document.getElementById('sort_place_up');
    // sort_date の各要素に対してループ処理でイベントを追加する
    for (var i = 0; i < sort_date.length; i++) {
        sort_date[i].addEventListener('click', function() {
            // 昇順の場合
            if (document.getElementById('sort_place_down').style.display !== "none") {
                document.getElementById('sort_place_down').style.display = "none";
                document.getElementById('sort_place_up').style.display = "block";
            // 降順の場合
            } else {
                document.getElementById('sort_place_down').style.display = "block";
                document.getElementById('sort_place_up').style.display = "none";
            }
        });
    }

    //距離のソート
    var sort_date = document.getElementsByClassName('sort_distance');
    var sort_date_down = document.getElementById('sort_distance_down');
    var sort_date_up = document.getElementById('sort_distance_up');
    // sort_date の各要素に対してループ処理でイベントを追加する
    for (var i = 0; i < sort_date.length; i++) {
        sort_date[i].addEventListener('click', function() {
            // 昇順の場合
            if (document.getElementById('sort_distance_down').style.display !== "none") {
                document.getElementById('sort_distance_down').style.display = "none";
                document.getElementById('sort_distance_up').style.display = "block";
            // 降順の場合
            } else {
                document.getElementById('sort_distance_down').style.display = "block";
                document.getElementById('sort_distance_up').style.display = "none";
            }
        });
    }

    //時間のソート
    var sort_date = document.getElementsByClassName('sort_time');
    var sort_date_down = document.getElementById('sort_time_down');
    var sort_date_up = document.getElementById('sort_time_up');
    // sort_date の各要素に対してループ処理でイベントを追加する
    for (var i = 0; i < sort_date.length; i++) {
        sort_date[i].addEventListener('click', function() {
            // 昇順の場合
            if (document.getElementById('sort_time_down').style.display !== "none") {
                document.getElementById('sort_time_down').style.display = "none";
                document.getElementById('sort_time_up').style.display = "block";
            // 降順の場合
            } else {
                document.getElementById('sort_time_down').style.display = "block";
                document.getElementById('sort_time_up').style.display = "none";
            }
        });
    }

    //カロリーのソート
    var sort_date = document.getElementsByClassName('sort_calorie');
    var sort_date_down = document.getElementById('sort_calorie_down');
    var sort_date_up = document.getElementById('sort_calorie_up');
    // sort_date の各要素に対してループ処理でイベントを追加する
    for (var i = 0; i < sort_date.length; i++) {
        sort_date[i].addEventListener('click', function() {
            // 昇順の場合
            if (document.getElementById('sort_calorie_down').style.display !== "none") {
                document.getElementById('sort_calorie_down').style.display = "none";
                document.getElementById('sort_calorie_up').style.display = "block";
            // 降順の場合
            } else {
                document.getElementById('sort_calorie_down').style.display = "block";
                document.getElementById('sort_calorie_up').style.display = "none";
            }
        });
    }

</script>
@endsection
