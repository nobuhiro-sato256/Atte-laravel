# atte
概要説明<br>
社員の勤務時間を一人ひとり管理するために、1日毎の稼働時間と休憩時間を記録して勤務時間を管理する勤怠管理システム
## 作成した目的
社員の勤務時間をデータ上で管理することにより部下の勤怠情報を手軽に、素早く確認できることで生産性の向上に繋がる可能性を高めるのを目的としている
## アプリケーションURL（未作成）
## 他のリポジトリ(未作成)
## 機能一覧
社員の新規登録、ログイン機能<br>
社員の勤務時間打刻機能<br>
ログイン済み（社員、管理職）対象の日付ごとの勤怠管理情報<br>　　
## 使用技術
PHP　7.4.9<br>
Laravel 8.83.27<br>
MySQL 8.0.26<br>
PHPMyadmin<br>
Nginx 1.21.1<br>
Bootstrap 5.3.0<br>
Docker/Docker-compose<br>　　
## テーブル設計
<img src="https://github.com/nobuhiro-sato256/atte-laravel/assets/60766413/f38bcd56-8b2e-463a-9ca5-e66596764b92" width="300">

## ER図
<img src="https://github.com/nobuhiro-sato256/atte-laravel/assets/60766413/4673859e-4038-4f4a-9df2-6ea69b6c881d" width="300">

## 環境構築
# Composerのインストール
```
composer install
```
# .envファイルのコピー、修正
```
cp .env.example .env
```
.envファイル　11行目以降
```
DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
+ DB_HOST=mysql
DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db