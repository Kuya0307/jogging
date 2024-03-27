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
console.log('light');
} else {
// ダークモード用の色を設定
document.documentElement.setAttribute('theme', 'dark');
console.log('dark');
}
});
});