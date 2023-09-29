# MimicStyler: HTML/CSS Edition（模仿造型師：HTML/CSS 版本）
介紹:
MimicStyler 是一款讓開發者練習和挑戰他們的前端技能的工具。
玩家可以選擇一個目標圖片，然後使用HTML和CSS試圖模仿它。
透過即時的視覺回饋和相似度比對，玩家可以不斷優化和完善他們的代碼。

主要功能:
1. 登入介面：玩家輸入他的HCTI API。
2. 圖片上傳：玩家上傳他想要模仿的圖片。
3. 即時編碼和預覽：玩家可以編寫HTML和CSS，並即時看到結果。
4. 相似度比對：系統會比較玩家創建的圖片和目標圖片的相似度。
5. 登出功能。

如何使用:
1. 首先，執行 start.bat。
2. 打開瀏覽器輸入 127.0.0.1:8000。
3. 進入登入介面輸入您的HCTI API。
4. 上傳您想要模仿的目標圖片。
5. 在編碼頁面中編寫HTML和CSS，並按下"確認"查看結果。
6. 按下"比對"來看您的圖片和目標圖片的相似度。
7. 若不再使用，按下"登出"。

技術細節:
1. 前端技術: 使用原生 HTML 和 CSS 來建構基本的網頁介面。
3. 後端技術: 使用 PHP 設計後端邏輯，尤其在處理 API 請求和圖片生成方面。
4. 透過 PHP 的 curl 函數呼叫外部 API (https://hcti.io/v1/image) 來生成玩家所編寫的 HTML/CSS 代碼的圖片。
5. 圖片處理:使用 JavaScript 函數比較兩張圖片的相似度，該函數計算兩圖片之間的像素差異。
6. 外部資源:使用了 https://htmlcsstoimage.com/ 這個外部服務，該服務將 HTML/CSS 代碼轉換為圖片。

待完善之項目:
更新中...

參考資料:
1. https://htmlcsstoimage.com/
2. https://codepen.io/rosewang0303/pen/mXrEwQ

UI 介面:

![Snipaste_2023-09-28_18-12-03](https://github.com/JustinHsu1019/MimicStyler-HTML-CSS-Edition/assets/141555665/ce26cb61-9212-44a7-90ca-d90efb121bda)
![Snipaste_2023-09-28_18-13-42](https://github.com/JustinHsu1019/MimicStyler-HTML-CSS-Edition/assets/141555665/fa37dd04-cc64-4478-9efc-d311ebc2f0b4)
