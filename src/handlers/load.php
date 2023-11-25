<?php

session_start();

$type = $_FILES['file']['type'];
$_SESSION['validation'] = [];

if ($_FILES['file']['name'] === '') {
    $_SESSION['validation']['typeError'] = 'Вы не выбрали файл!';
    header('Location: ../../home.php');
} elseif ($type === 'audio/mpeg') {
    move_uploaded_file($_FILES['file']['tmp_name'],
    $_SERVER['DOCUMENT_ROOT'] . '\mp3Files\\' . $_FILES['file']['name']);
    $_SESSION['validation']['success'] = 'Файл успешно загружен!';
} else {
    $_SESSION['validation']['typeError'] = 'Не поддерживаемый формат!';
}
header('Location: ../../home.php');