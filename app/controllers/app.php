<?php

$products = $db->query("SELECT * FROM `posts`")->findAll();
$count = $db->query("SELECT * FROM `posts`")->allRowCount();


require VIEWS . '/incs/header.php';
require VIEWS . '/incs/main.php';
require VIEWS . '/incs/footer.php';
