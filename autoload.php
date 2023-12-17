<?php

//function autoLoader(string $className): void
//{
//    $filesResult = scandir(__DIR__);
//    foreach ($filesResult as $file) {
//        if (!is_dir($file) || str_starts_with($file, '.') || $file === 'vendor') {
//            continue;
//        }
//        loadDir($file, __DIR__);
//    }
//}
//
//function loadDir(string $dir, string $path): void
//{
//    $files = scandir($dir);
//    foreach ($files as $file) {
//        if ($file === '.' || $file === '..') {
//            continue;
//        }
//
//        if (is_dir($file)) {
//            loadDir($file, $dir);
//        } else {
//            require_once $dir . '/' . $file;
//        }
//    }
//}
//
//spl_autoload_register('autoLoader');