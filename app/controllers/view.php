<?php

$id = $_GET['id'];
$post = $db->query("SELECT * FROM `posts` WHERE id = ?", [$id])->find();
$comments = $db->query("SELECT * FROM `comments` WHERE product_id = ?", [$id])->findAll();



require VIEWS . '/view.tpl.php';
