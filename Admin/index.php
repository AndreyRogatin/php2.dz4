<?php

require __DIR__ . '/../autoload.php';

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];
$parts = explode('/', $uri);
array_shift($parts);
$action = array_pop($parts);
$ctrlName = '';

if (count($parts) > 1) {
    foreach ($parts as $part) {
        $ctrlName .= '\\' . ucfirst($part);
    }
} else {
    $action = 'action';
    $ctrlName = '\Admin\Index';
}

$className = '\App\Controllers' . $ctrlName;

$ctrl = new $className;
$ctrl->$action();