# LEMP研修課題

## 1.準備

### 立ち上げ
```
$ docker-compose up --build
$ docker-compose exec app ash
> php artisan storage:link
> php artisan migrate
> php artisan db:seed
```

### mysql
```
$ docker-compose exec db bash -c 'mysql -uroot -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
```
### host

http://localhost:10080

## 2.概要

#### 使用した技術
* nginx
* php
* Laravel
* mysql
* redis

#### 簡易ディレクトリ構成
.
├── README.md
├── blog.sql
├── docker
│   ├── ash
│   ├── mysql
│   ├── nginx
│   └── php
├── docker-compose.yml
└── src(laravelのメインディレクトリ)
    ├── app
    ├── artisan
    ├── bootstrap
    ├── composer.json
    ├── composer.lock
    ├── config
    ├── database
    ├── package.json
    ├── phpunit.xml
    ├── public
    ├── resources
    ├── routes
    ├── server.php
    ├── storage
    ├── tests
    ├── vendor
    └── webpack.mix.js

#### 実装した機能

* ユーザー登録・認証
* ブログCRUD
* ブログ記事CRUD

## 3.アピールポイント

* 全体
  * phpを使うのは初めてだったので、Laravelフレームワークを使用し、基本的な機能を効率的に実装した。
  * bootstrapを用いて、CSSの量を抑えることで実装時間を短縮した。
  * 単純にブラウザ上からCRUDできるだけでなく、ページ遷移も意識して実装した。
  * ブログのコンテンツやヘッダー画像のデータ一式を用意し、他の開発者が開発を進める場合にも網羅的にデバッグできるようにした。
* 機能
  * 認証機能はLaravelのおかげで、一発でできたので、それに基づきブログの編集・削除権限の設定を実装した。
  * ブログのヘッダーイメージなどを登録するために、画像アップロード機能を搭載した。
  * 記事に投稿されたbodyのサニタイズや、パスワードをハッシュ化して保存するなど、基本的な脆弱性には対処している(と言ってもphpに元々用意されている関数を使っただけ)