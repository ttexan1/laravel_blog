# LEMPブログアプリ

## 1.準備

### 立ち上げ
```
$ docker-compose up --build
$ docker-compose exec app composer install
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

```
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
```