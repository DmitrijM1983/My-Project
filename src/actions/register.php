<?php

session_start();

require_once '../../User.php';

$userName = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password1'];
$password2 = $_POST['password2'];

$_SESSION['old'] = [];
$_SESSION['old']['name'] = $userName;
$_SESSION['old']['email'] = $email;

$_SESSION['validation'] = [];

if(preg_match('/[А-Яа-я\*\?\#\$\%\!\@\%\^\&\(\)\;\:\~\`\+\,\<\>\_\/]/', $userName)) {
    $_SESSION['validation']['name'] = 'Логин может содержать только буквы латинского языка и цифры!';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['validation']['email'] = 'Указана неверная почта!';
}

if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['validation']['password'] = 'Проли не совпадают!';
}

if (empty($_POST['password1'])) {
    $_SESSION['validation']['password'] = 'Введите пароль!';
}

if (!empty($_SESSION['validation'])) {
    header('Location: ../../reg.php');
}

if (empty($_SESSION['validation'])) {
    $params = array(
        'user_name' => $userName,
        'email' => $email,
        'password' => md5($password),
        'role' => 'user'
    );
    $user = new User();
    $user->registration($params);
    header('location: ../../login.php');
}