<?php

use myfrm\Db;

require dirname(__DIR__) . '/config/config.php';
require VENDOR . '/autoload.php';
require CONFIG . '/funcs.php';

$db = (Db::getInstance())->getConnection();




require CORE . '/router.php';
