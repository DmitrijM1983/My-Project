<?php

 session_start();
require_once '../../Classes/File.php';

 $_SESSION['validation'] = [];

$type = $_FILES['file']['type'];

if ($type === 'audio/mpeg' || $type === 'audio/flac') {
    $tmp = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $file = new File();
    $file->checkFile($tmp, $name);
} else {
    $_SESSION['validation']['typeError'] = 'Неподдерживаемый формат!';
    header('Location: ../../home.php');
}