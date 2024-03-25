@extends('layouts.jogging')

@section('month_look','月別一覧画面')

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

<button onclick="previous_month()">次へ</button>
<button onclick="next_month()">次へ</button>
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
        
        let table = '<table><tr><th colspan="7">'  + year + '年' + ' ' + monthNames[month - 1] + '</th></tr>';
        table += '<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr><tr>';
        
        let day = 1;
        for (let i = 0; i < 42; i++) {
            if (i === firstDayIndex + daysInMonth) {
                break;
            }
            if (i < firstDayIndex || day > daysInMonth) {
                table += '<td></td>';
            } else {
                table += '<td><a href="/view?year=' + year + '&month=' + month + '&day=' + day + '">' + day + '</a></td>';
                day++;
            }
            if (i % 7 === 6) {
                table += '</tr><tr>';
            }
        }
        
        table += '</tr></table>';
        calendarDiv.innerHTML = table;
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
