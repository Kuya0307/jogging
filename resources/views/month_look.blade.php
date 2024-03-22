<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Light-Dark</title>
  <link rel="stylesheet" href="./style.css">
  <script src="./index.js"></script>
</head>
<body>
  <h1>タイトル</h1>
  <label>ライトモード
  <input type="radio" checked name="1" value="right"></label>
  <label>ダークモード
  <input type="radio" name="1" value="bark"></label>
  <p>テキストテキストテキストテキスト</p>
  <button class="btn">ボタン</button>
</body>
<style>
    /* ライトモード(通常)用の色を設定 */
:root {
  --main-text: #000000;
  --main-bg: #ffffff;
  --btn-color: #a9a9a9;
}

/* ダークモード用の色を設定 */
:root[theme="dark"] {
  --main-text: #ffffff;
  --main-bg: #000000;
  --btn-color: #32ed6a;
}

body {
  color: var(--main-text);
  background-color: var(--main-bg);
}

.btn {
  background-color: var(--btn-color);
}
</style>
<script>
    // ラジオボタンの要素を取得
    const radios = document.querySelectorAll('input[type="radio"]');
    // ラジオボタンが変更された時の処理
    radios.forEach(radio => {
    radio.addEventListener('change', () => {
    // ラジオボタンの値を取得
    const theme = radio.value;
    // themeがrightの場合
    if (theme === 'right') {
    // ライトモード用の色を設定
    document.documentElement.setAttribute('theme', 'light');
    } else {
    // ダークモード用の色を設定
    document.documentElement.setAttribute('theme', 'dark');
    }
    });
    });
</script>
</html>
