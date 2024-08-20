<?php

include 'autoload.php';

$newsController = new App\Controllers\NewsController();
$dataBase = new App\Models\DataBase();
$newsModel = new App\Models\NewsModel();

include 'routers.php';