# LEMP研修課題

## 1.準備

### 立ち上げ
```
$ docker-compose up --build
```

### php
```
$ docker-compose exec app ash
> php artisan migrate
> php artisan db:seed
```

### mysql
```
$ docker-compose exec db bash -c 'mysql -uroot -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
> use homestead
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

#### 実装した機能
* ユーザー登録・認証
* ブログCRUD
* ブログ記事CRUD

## 3.アピールポイント
* phpを使うのは初めてだったので、Laravelフレームワークを使用し、基本的な機能を効率的に実装した。
* 単純にブラウザ上からCRUDできるだけでなく、ページ遷移も意識して実装した。
* ブログのヘッダーイメージなどを登録するために、画像アップロード機能を搭載した。
* 認証機能はLaravelのおかげで、一発でできたので、それに基づきブログの編集・削除権限の設定を実装した。
* bootstrapを用いて、CSSの量を抑えることで実装時間を短縮した。