<?php

use MyProject\Core\App;
use MyProject\Core\Request;
use MyProject\Core\Route;
use MyProject\Database\DB;

require_once "vendor/autoload.php";
require 'function/helper.php';
App::bind('config/app', require_once "config/app.php");
App::bind('MYSQL', DB::makeConnection());
Route::load("config/router.php")
    ->direct(Request::uri()[0], Request::method());

?>

