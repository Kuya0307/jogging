<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        @foreach($jog_data as $jog)
        <div>
        <img src="{{asset('storage/' . $jog->course_img_pass)}}">
            <a>戻る</a>
        </div>

        <div>
            <h1>
                {{$jog->date}}<span>の記録</span>
            </h1>
            @if($jog->jog_env == 0)
                <p>場所<span>屋内</span></p>
            @else
                <p>場所<span>屋外</span></p>
            @endif
            <p>距離<span>{{$jog->distance}}<span>km</span></span></p>
            <p>時間<span>{{$jog->jog_time}}</span></p>
            <p>消費カロリー<span>{{$jog->calorie}}<span>kcal<span></span></p>
            <a>編集</a>
            <a>削除</a>
        </div>
        @endforeach
    </main>
</body>
</html>