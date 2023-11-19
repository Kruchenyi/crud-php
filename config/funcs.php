<?php


function dump($data)
{
    echo '<pre>';
    var_dump($data);
    '</pre>';
}
function dd($data)
{
    dump($data);
    die;
}

function printArr($data)
{
    echo '<pre>';
    print_r($data);
    '</pre>';
}


function load($fillable = [])
{
    $data = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, $fillable)) {
            $data[$key] = trim($value);
        }
    }
    return $data;
}


function old($fildname)
{
    return isset($_POST[$fildname]) ? h($_POST[$fildname]) : '';
}
function h($data)
{
    return htmlspecialchars($data, ENT_QUOTES);
}
