<?php




$id = $_POST['id'];
$comment = trim(h($_POST['comment']));

$comments = $db->query("INSERT INTO `comments` (id, product_id, comment) VALUES (NULL, :id, :comment)", [
    ':id' => $id,
    ':comment' => $comment
]);
header("Location: view?id=$id");
