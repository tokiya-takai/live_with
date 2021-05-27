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
・2021/05/05 faviconを設定<br />
・2021/05/16 登録情報の細分化・エラー文の日本語化・ユーザーページ・ユーザー情報更新機能(β)<br />

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

ユーザー管理機能<br />
・新規登録・ログイン・ログアウト<br />
・登録情報の変更<br />
・メールでのパスワードリセット<br />
・リストの公開、非公開設定(デフォルト：非公開)<br />
<br />
リスト<br />
・新規投稿<br />
・編集機能<br />
・削除機能<br />
・Vueを使用した並び替え機能<br />
・いいね機能<br />
・いいねした投稿の一覧表示<br />
<br />
ハンバーガーメニュー<br />
<br />
レスポンシブデザイン<br />
<br />
その他<br />
・Illustratorを使用<br />
ロゴ、いいねマーク<br />

## セキュリティ対策
・XSS対策<br />
・CSRF対策<br />
・SQLインジェクション対策<br />
・キャッシュコントロール対策<br />
・クリックジャッキング対策<br />

## 実装予定機能

・~~投稿の削除機能~~                             2021/05/01 実装完了<br />
・~~登録情報の細分化~~                           2021/05/16 実装完了<br />
・~~エラー文の表示と日本語化~~                     2021/05/16 実装完了<br />
・~~ユーザーページ、情報の更新機能~~                2021/05/16 実装完了<br />
・~~パスワード変更機能~~                          2021/05/17 実装完了<br />
・~~文字数カウンター~~                            2021/05/17 実装完了<br />
・~~ハンバーガメニュー~~                          2021/05/18 実装完了<br />
・~~公開非公開機能及び他ユーザーの投稿の閲覧機能~~    2021/05/19 実装完了<br />
・~~AWSに移行~~                                 2021/05/21 実装完了<br />
・~~AWSでのSSL化~~                              2021/05/22 実装完了<br />
・~~いいね機能~~                                 2021/05/23 実装完了<br />
・~~シェア用リンク登録機能~~                       2021/05/24 実装完了<br />
・~~コメント機能~~                               2021/05/24 実装完了<br />

## 今後実装したい機能、行いたいこと

~~・登録情報を細分化し、よりユーザビリティを高めたい。~~<br />
~~->現時点では、登録情報としてタイトルと説明の２項目しかないため、サポートの実現性が低い。~~<br />
~~登録情報を細分化し、管理に必要な情報の登録漏れを防ぐことで、サポートの実現性を高める。~~<br />
2021/05/16 実装完了

・~~SSL化~~<br />
->~~現時点では、HTTP通信となっておりセキュリティに脆弱性がある。そのためHTTPS通信に切り替え、通信の暗号化を進める。~~<br />
2021/05/02 実装完了

・コードやファイルの整理<br />
今回初めて使用した技術が多く、コードが冗長だったり、非効率なファイルの構造をしていたりがある。<br />
その改善を行い、保守性を上げていく。<br />


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
2021/04/29 実装完了

### レスポンシブ

・~~スマートフォンの場合、機種によるレイアウトの乱れがあるため、対応する。~~<br />
2021/05/03 グリッドレイアウトを採用し、実装完了

・iOS端末での高さ調整<br />
->iOSではアドレスバー及びメニューバーが表示され、レイアウトの一部が隠れてしまう現象が起きている。<br />
これらはスクロールすることで消えるものであるが、当アプリは縦に長くないため難しい。<br />
Android端末は実機が無いため未検証<br />
<br />