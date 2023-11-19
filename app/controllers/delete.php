<?php


$id = $_GET['id'];

$post = $db->query("DELETE FROM `posts` WHERE `posts`.`id` = :id", ['id' => $id]);
header('Location: index');
