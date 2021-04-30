<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center"><a href="https://github.com/tokiya-takai/live_with/tree/main/backend"><img src="https://user-images.githubusercontent.com/76773842/115679627-be19a500-a38d-11eb-9fe5-9f719a4e6920.png" width="400"><a></p>
<p align="center">
<img src="https://user-images.githubusercontent.com/76773842/115685325-1606da80-a393-11eb-9ec8-74fa975c6950.jpeg" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685404-28811400-a393-11eb-90c0-16ff513f7e45.jpeg" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685639-5ebe9380-a393-11eb-94a7-bf3f67ae75b2.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685719-71d16380-a393-11eb-920e-e0321e4b6a4f.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685830-8e6d9b80-a393-11eb-8fd5-0607c58187b3.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685885-9cbbb780-a393-11eb-86a4-4874da724ae5.png" width="50">
<img src="https://user-images.githubusercontent.com/76773842/115685967-b230e180-a393-11eb-981f-082fbc497a04.png" width="50">
</p>

## 概要

靴好きのための管理アプリです。<br />
この靴最後に履いたのいつだっけ？メンテナンスは何をしたっけ？そういった問題を回避し、<bt />
定期メンテナンスの必要な革靴を傷めないよう、管理をサポートします。<br />

## 開発期間
・2021/04/10 Laravelの学習を開始<br />
・2021/04/17 Dockerの学習を開始<br />
・2021/04/28 機能を実装、デプロイ<br />
・バグの修正と各機能の充実を継続<br />

## テストアカウント

・メールアドレス<br />
guest@test.co.jp<br />

・パスワード<br />
guest123<br />


## 開発環境

MacOS Catalina 10.15.7<br />
PHP 7.3.11<br />
Laravel Framework 8.37.0<br />
Vue.js 2.6.12<br />
Docker 20.10.5<br />
Docker Compose 1.29.0<br />

## 機能

Authを使用したユーザー管理機能<br />
・新規登録・ログイン・ログアウト<br />
<br />
リストの投稿機能<br />
・新規投稿<br />
・編集機能<br />
・Vueを使用した並び替え機能<br />
<br />
レスポンシブデザイン<br />
<br />
その他<br />
・ロゴ　Illustratorで作成<br />

## 実装予定機能

・~~投稿の削除機能~~ 5/1実装完了<br />
・検索機能
・他ユーザーのリストの閲覧機能<br />
・公開非公開機能<br />

## 今後実装したい機能

・登録情報を細分化し、よりユーザビリティを高めたい。<br />
->現時点では、登録情報としてタイトルと説明の２項目しかないため、サポートの実現性が低い。<br />
登録情報を細分化し、管理に必要な情報の登録漏れを防ぐことで、サポートの実現性を高める。<br />

・SSL(TLS)化<br />
->現時点では、HTTP通信となっておりセキュリティに脆弱性がある。そのためHTTPS通信に切り替え、通信の暗号化を進める。<br />


## 課題

### 画像処理

~~・Heroku~~<br />
~~Herokuの仕様上、画像の生成ができない。ローカルではStorageにシンボリックを使用した形で画像の取得を行っていたが、Heorkuで再現ができない。~~<br />
~~/<試したこと>~~<br />
~~DBのカラムを、画像のパス(file_path)からバイナリデータを保存する方法~~<br />
~~->結果　実現できず~~<br />
~~原因 : 画像表示はvueのtemplateであり、laravelとの連携での実現ができなかった。複数の方法で試したが、理想状態に持っていくことができなかった。~~<br />

~~・S3~~<br />
~~Error: Class 'League\Flysystem\AwsS3v3\AwsS3Adapter' not foundが解決できず、導入できていない。~~
~~/<試したこと>~~<br />
~~league/flysystem-aws-s3-v3をrequireしたが、同エラーが未解決。バージョンの不整合の仮説のもと、^1.0 , ^2.0 , 1.0.29を検証した。~~<br />
~~->結果　解決せず~~<br />
~~原因 : 模索中~~

### レスポンシブ

・スマートフォンの場合、機種によるレイアウトの乱れがあるため、対応する。