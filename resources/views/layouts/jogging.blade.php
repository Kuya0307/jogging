<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script> -->
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/view.css">

    <!-- フォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <!-- アイコン -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="joggingapp">
    <header class="header">
        <h1>アプリ名</h1>
        <div class="right-side">
            <div class="icon-menu">
                <a href="jog_reg">
                    <span class="material-symbols-outlined">add</span>
                </a>
                <a href="month_look">
                    <span class="material-symbols-outlined">calendar_month</span>
                </a>
                <a href="report">
                    <span class="material-symbols-outlined">description</span>
                </a>
                <a href="config">
                    <span class="material-symbols-outlined">settings</span>
                </a>
            </div>
            <div class="user-menu">
                <span class="material-symbols-outlined">person</span>
                <span class="user-name">[ユーザ名]</span>
                <a href="#"><span class="material-symbols-outlined txt-red">logout</span></a> <!-- ログアウト機能 -->
            </div>
        </div>
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>