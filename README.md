# Unreleased Admin Panel

#### Unreleased Admin was developed for administrators to manage and backend for Unreleased mobile application.

This source will be hosted on https://admin.unreleased.id

CPanel account for live online server.
http://unreleased.co.id:2082/
IP Address: 153.92.10.79
username : u5082149
password : mJJ-Y?ZqfZ86

And mobile application will be published on google play here.

<a  href='https://play.google.com/store/apps/details?id=com.silverit.unreleased'  target='_blank'><img  height='50'  style='border:0px;height:50px;'  src='https://i.imgur.com/2PJ8fls.png'  border='0'  alt='GooglePlay Link'  /></a>

This repository was based on Laravel and bootstrap admin template bought from https://themeforest.net/item/datta-able-bootstrap-admin-template/22954576.

Mysql Database was used and database connection was configured in .env file in root directory.

database : u5082149_unreleased
username : u5082149_unreleased
password : unreleased

### To use this laravel packages to run this backend, first follow commands should be run.

> composer install

### To run this backend on local for mobile application like normal laravel application
> php artisan serve

### Super administrator credentials
- user email : super@gmail.com
- password : password

### Customer test credntials

- user email : customer@gmail.com
- passowrd : password / test / 1234


## API document for Custom Products
https://docs.google.com/document/d/1lq_gfkGkG1veULjwWU1up966vLGhoJuQGkvcGbwvYEs/edit

### All restful APIs for mobile application are routed by app/Http/Controllers/ApiController.php