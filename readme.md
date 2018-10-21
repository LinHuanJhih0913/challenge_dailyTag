# challenge_dailyTag
後端菜鳥挑戰賽 - 每日標籤系統

## 基本功能
 - 本服務需要登入才能使用
 - 分為管理員及使用者
 - 使用者註冊功能
 - 使用者登入功能
 - 使用者下每日標籤功能
 - 顯示該使用者所有或今日標籤功能

## 每日標籤系統
後台（管理員）
 - 顯示所有標籤
 - 顯示某用戶的標籤
 - 搜尋某標籤對應的用戶列表
 - 統計所有標籤被使用的次數（比如 iOS 5 次）

前台（使用者）
 - 下每日標籤（提供多筆的下法，比如 [iOS,Android,Backend,Web]）
 - 顯示今日已下的標籤（該使用者）
 - 顯示所有下過的標籤（該使用者、按照日期排序）

## Getting Started
### step 1 - Clone project

`git clone https://github.com/LinHuanJhih0913/challenge_dailyTag.git`

### step 2 - Change directory to challenge_dailyTag

`cd challenge_dailyTag`

### step 3 - Install packages

`composer install`

### step 4 - Create .env file

`cp .env.example .env`

### step 5 - Set environment parameters

### step 6 - Generate a APP_KEY

`php artisan key:generate`

### step 7 - Create a database

### step 8 - Migrate

`php artisan migrate`
 
