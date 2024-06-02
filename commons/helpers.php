<?php

if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = scandir($pathFolder); //Hàm scandir() trong PHP được sử dụng để liệt kê các tệp và thư mục trong một thư mục đã cho
        $files = array_diff($files, ['.', '..']);
        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}


if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";
        print_r($data);
    }
}
