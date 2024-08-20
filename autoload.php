<?php

/**
 *@decription Автозагрузка файла класса с учетом пространств имен
 */
function autoload($namespace)
{
    $namespace = str_replace('\\', '/', $namespace);
    $file = __DIR__ . '/src/' . $namespace . '.php';

    if (file_exists($file)) {
        include $file;
    } else {
        throw new Exception("ОШИБКА! Класс $namespace не найден в $file");
    }
}

spl_autoload_register('autoload');