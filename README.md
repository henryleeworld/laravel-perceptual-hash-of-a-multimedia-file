# Laravel 11 多媒體檔案的感知雜湊

引入 jenssegers 的 imagehash 套件來擴增多媒體檔案的感知雜湊，感知雜湊的作用是對每張圖片生成一個指紋字串，然後進而比較不同圖片的指紋，如果結果越接近，就說明圖片越相似。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/perceptual-hash` 來進行一張圖片和該圖片加入浮水印的感知雜湊比較。

----

## 畫面截圖
![](https://i.imgur.com/Ey473GL.png)
> 如果不相同的數據位不超過 5，就說明兩張圖片很相似
