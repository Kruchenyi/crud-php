<?php


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    $db->query(
        "UPDATE `posts` SET `title` = :title , `comment` = :comment, `price` = :price WHERE `posts`.`id` = :id;",
        [
            'title' => $title,
            'comment' => $comment,
            'price' => $price,
            'id' => $id,
        ]
    );
    header('Location: index');
}



require VIEWS . '/update.tpl.php';
