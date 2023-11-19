<?php

namespace myfrm;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fillable = ['title', 'comment', 'price'];
    //? функция load проверяет совпадают ли в массиве fillable ключи массива $_POST 
    $data = load($fillable);
    $rules = [
        'title' => [
            'required' => true,
            'min' => 5,
            'max' => 20
        ],
        'price' => [
            'required' => true
        ],
        'comment' => [
            'required' => true,
            'min' => 20
        ]

    ];
    $validator = new Validator();
    $validation = $validator->validation($data, $rules);

    if (!$validation->hasError()) {
        $db->query("INSERT INTO `posts` (`id`, `title`, `comment`, `price`) VALUES (NULL, :title, :comment, :price);", $data);
        header('Location: index');
    } else {
        // printArr($validation->getError());
    }
}
require VIEWS . '/form.tpl.php';
