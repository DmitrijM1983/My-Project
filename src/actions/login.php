<?php

session_start();

require_once '../../User.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = new User();
    $user->login($email, $password);
} elseif (!empty($_POST)) {
    echo 'Заполните корректно все поля!';
}