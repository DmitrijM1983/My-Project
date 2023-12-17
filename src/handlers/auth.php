<?php

session_start();

require_once '../../Classes/User.php';

if (!empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = new User();
    $user->login($email, $password);
}
