<?php

session_start();

require_once '../../User.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = new User();
    $user->login($email, $password);

