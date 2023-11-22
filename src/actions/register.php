<?php

session_start();

require_once '../../User.php';

if (!empty($_POST['email']) && !empty($_POST['password1']) && ($_POST['password1'] === $_POST['password2'])) {
    $params = array(
        'user_name' => $_POST['user_name'],
        'email' => $_POST['email'],
        'password' => md5($_POST['password1']),
        'role' => 'user'
    );
    $user = new User();
    $user->registration($params);
    header('location: ../../login.php');
} else {
    echo 'Заполните корректно все поля!';
}