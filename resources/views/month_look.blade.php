@extends('layouts.jogging')

@section('month_look','月別一覧')

@section('content')
    @section('header')
    @endsection
    <main id="month_look">
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
    </style>
<div id="calendar"></div>
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
        
        let cal_table = '<a onclick=previous_month()>[前月に移動するアイコン]</a><h1>'  + year + '年' + ' ' + monthNames[month - 1] + '</h1><a onclick=next_month()>[次月に移動するアイコン]</a>';
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








<!--ここからリスト-->











<div> <!-- リスト形式 -->
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
                <th><a href="#">日付</a>[並替アイコン]</th>
                <th><a href="#">場所</a>[並替アイコン]</th>
                <th><a href="#">距離</a>[並替アイコン]</th>
                <th><a href="#">時間</a>[並替アイコン]</th>
                <th><a href="#">消費カロリー</a>[並替アイコン]</th>
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

    function generateList(year, month) {
        const calendarHeader = document.getElementById('ListHeader');
        const calendarBody = document.getElementById('calendarBody');
        const date = new Date(year, month - 1, 1);
        const daysInMonth = new Date(year, month, 0).getDate();
        const firstDayIndex = date.getDay();

        const monthNames = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];

        ListHeader.innerHTML = '<a onclick="previous_month_list()">[前月に移動するアイコン]</a>' +
                                    '<h1>' + year + '年' + ' ' + monthNames[month - 1] + '</h1>' +
                                    '<a onclick="next_month_list()">[翌月に移動するアイコン]</a>';

        let list_table = '';
        let day = 1;
        for (let i = 0; i < 42; i++) {
            if (i === firstDayIndex + daysInMonth) {
                break;
            }

            let jogData = @json($jog_data);
            jogData.forEach(jog => {
                let jogDate = new Date(jog.date);
                let jogYear = jogDate.getFullYear();
                let jogMonth = jogDate.getMonth() + 1; // 月は0から11で表されるため、1を加える
                let jogDay = jogDate.getDate();
                
                if (year === jogYear && month === jogMonth && day === jogDay) {
                    list_table += '<tr><td><a href="/view?year=' + jogYear + '&month=' + jogMonth + '&day=' + jogDay + '">' + jogYear + '/' + jogMonth + '/' + jogDay + '</a></td>' +
                                '<td>[場所アイコン]</td>' +
                                '<td>[距離]<span>km</span></td>' +
                                '<td>[時間]</td>' +
                                '<td>[消費カロリー]<span>kcal</span></td>' +
                                '<td>[編集アイコン][削除アイコン]</td></tr>';
                }
            });
            day++;
        }

        calendarBody.innerHTML = list_table;
    }

    // 初期表示
    generateList(currentYear_list, currentMonth_list);

    // 前月へ
    function previous_month_list() {
        if (currentMonth === 1) {
            currentYear--;
            currentMonth = 12;
        } else {
            currentMonth--;
        }
        generateList(currentYear, currentMonth);
    }

    function next_month_list() {
        if (currentMonth === 12) {
            currentYear++;
            currentMonth = 1;
        } else {
            currentMonth++;
        }
        generateList(currentYear, currentMonth);
    }
</script>



</main>
@endsection
