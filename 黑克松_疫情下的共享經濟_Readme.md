# 黑克松_疫情下的共享經濟_Readme
## 1. 動機
由於疫情爆發，許多觀光地區遊客減少，導致以販售農副產品為主的農民入不敷出，於是我們想提供一個平台讓各地區的農民們可以在網路上販售自己的產品，使農民們可以不受位置及災情影響販賣產品，多一個往外銷售的窗口。
## 2. 程序
![](https://i.imgur.com/Y33zhjj.png)

農民先在網站上刊登自己農園已有的果樹，並繳交廣告租金，消費者在網路平台得到商品資訊，接著選擇要認領的樹種、認領時間及地點，付費後農民依其選取的果樹種類租給消費者，等待果樹收成後再透過物流將其農產品送至消費者手上，完成此訂單。

![](https://i.imgur.com/oJMzW9r.png)

為了保障消費者，每種果樹會有不同的最低固定量，也就是消費者在認領果樹後保證能拿到一定數量的水果。

當季採收量低於當初保證的下限:
1. 若農民收成足夠，則農民會補足消費者不足的數量
2. 若農民收成不足，則依消費者不足量的百分比退費
## 3. 網頁說明
### A. 首頁(簡介)
![](https://i.imgur.com/1NDKW59.jpg)

首頁，按下Get start會下滑到About us的部分

![](https://i.imgur.com/zIRanEy.jpg)


右邊有選單，可連結到訂購商品頁(Support us)、農民登入頁(Login)

![](https://i.imgur.com/acchpZN.jpg)

在左上加了Icon & 本頁標題

![](https://i.imgur.com/82tFSKy.jpg)

![](https://i.imgur.com/IpxXRwF.jpg)

關於我們，介紹我們發想這個網站的理念、動機，及我們這個網站在做的事情

![](https://i.imgur.com/gzPlRCp.jpg)

運作方式，用流程圖簡單介紹買方及賣方的作業流程，透明化消費者與農民間的交易

![](https://i.imgur.com/Y25AioE.jpg)

銷售排行榜，展示本季銷售前三名的農民，以茲鼓勵

![](https://i.imgur.com/kODfCXw.jpg)

顧客回饋，可填寫姓名、電子郵件、評分(下拉式選單)及留言的表單，和一個sent message的button
(此表單沒有連結後端)

![](https://i.imgur.com/ZHSiu5q.jpg)

最底下附上Icon的reference

### B. 訂購及商品資訊

![](https://i.imgur.com/U8vHWiC.jpg)

介紹網站的創作理念，希望透過此平台可以使農民有比較穩定的收入

![](https://i.imgur.com/xD6INrC.jpg)

介紹顧客如果想出租果樹的流程，按照步驟就可以擁有一顆自己的樹啦~

:warning: 注意事項是如果遇到天災無法順利收成的應對方式，記得詳細閱讀才不會權益受損

![](https://i.imgur.com/gsC8uQm.jpg)
![](https://i.imgur.com/cbAlPMd.jpg)

閱讀完上面的內容開始選擇預約果樹的地區與種類，按下搜尋後會顯示符合的果園

:warning: 地區與種類的下拉式選單為一個示意圖，果園資訊使用"台北"的"蘋果"園為範例

![](https://i.imgur.com/FMR51KW.jpg)

顯示符合搜尋結果的果園並將果園資訊(基本介紹、價格、消費者最少可拿到的數量、地址、電話)告知消費者，果園圖片會自動輪換也可點擊輪換

![](https://i.imgur.com/Ze5rN77.jpg)

開始填寫認領表單，姓名、年齡、電子郵件、電話、住家地址、果園代號、數量、種類、付費方案

:star: 表單具有防呆機制
* 年齡必須為1~3位數字
* 電子郵件要有完整格式(須包含@)
* 電話須為10位數字
* 數量為1~3位數字

![](https://i.imgur.com/mTkdqKk.jpg)

填寫完表單按確認訂單送出

![](https://i.imgur.com/TrURj4n.jpg)

跳出視窗確認訂單送出

![](https://i.imgur.com/uWxOp0b.jpg)

顯示successfully，三秒後自動跳轉回訂購頁

### C. 農民登入及後台
![](https://i.imgur.com/gXpG0CB.png)

:seedling: 圖一

在後端資料庫建構合作農民的帳號密碼，完成後首頁右邊選單點選Login會進入登入系統(圖一)，農民在這邊的角色就像是管理員，每個農民都可以登入屬於自己的系統(圖二)，若帳號密碼錯誤須重新輸入，另外設有防呆機制，帳號密碼為必填項目

![](https://i.imgur.com/3tIZn6b.jpg)

![](https://i.imgur.com/aL0vFkE.jpg)

:seedling: 圖二、圖三

系統第一頁顯示贊助人數、預約果樹的數量、剩餘果樹數量、總贊助金額、簡單的訂單資料，點擊右上方頭像可以登出回到首頁(圖三)

![](https://i.imgur.com/BAVTLXn.jpg)

:seedling: 圖四

系統第二頁將訂單更詳細的資料列出，使農民可以更加瞭解出售狀況

## 4. 後端server建立
使用XAMPP當作後端Server用，並且在phpmyadmin內建立資料庫
1. 須建立一個新資料庫，名稱為order
2. 由我們提供的order.sql來建立後端的Table，當中有範例數據
3. 將zip中其他檔案放到C:\xampp\htdocs中
4. 去cool/dashboard.php中第40 & 41行修改phpmyadmin的帳號及密碼
5. 去cool/table.php中第38 & 39行修改phpmyadmin的帳號及密碼
6. 去transitive/support.php中第19 & 20行修改phpmyadmin的帳號及密碼
7. 開啟瀏覽器，並輸入網址: http://localhost/transitive/index.html
