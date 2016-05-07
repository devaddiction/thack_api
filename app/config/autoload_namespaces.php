<?php

function autoload_classes($class)
{
    $appDir = dirname(__DIR__) . '/src';
    $path = $appDir . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once($path);
    } else {
        $path = str_replace("/src/", "/src/Library/", $path);
        if (file_exists($path)) {
            require_once($path);
        } else {
            return false;
        }
    }

    return false;
}
