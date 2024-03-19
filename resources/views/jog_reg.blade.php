<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Jogging-情報登録</title>
</head>
<body>
    <h1>新規データ登録</h1>
    <main id="jog_reg">
        <form action="#" method="get">
            日付 <input type="date" name="date" required><br>
            場所
            <select name="blood_type" required>
                <option value="o-place">屋外</option><br>
                <option value="i-place">屋内</option><br>
            </select><br>
            距離 <input type="text" name="distance" placeholder="例:12.34" required>km <br>
            時間 <input type="time" name="time"  step="1"><br>
            消費カロリー <input type="text" name="kcal" placeholder="例:1234" required>kcal <br>
            画像 <input type="file" id="fileElem" multiple accept="image/*" style="display:none" />
                 <button id="fileSelect" type="button">ファイルを選択</button> <br>

            <button class="cancel" type="reset">キャンセル</button>
            <button class="btn-primary" type="submit">登録</button>
        </form>
    </main>
</body>
</html>