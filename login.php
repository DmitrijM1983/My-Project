<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        .form {
            width: 600px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <title>Music Storage</title>
</head>
<body>
<div class="form">
    <H1>Войти</H1>
    <form action="login.php" method="post">
        <div class="mb-3">
            <input type="email" name="user_name" class="form-control"  aria-describedby="emailHelp" placeholder="Введите email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <input type="submit">
        </div>
    </form>
</body>
</html>

<?php

require_once 'User.php';

if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
    $params = array(
        'user_name' => $_POST['user_name'],
        'password' => md5($_POST['password']),
    );
    $user = new User();
    $user->login($params);
}



//if (($result['user_name'] === $params['user_name']) && ($result['password'] === $params['password'])) {
//echo 'Добро пожаловать';
//} else {
//echo 'Логин или пароль введены не верно!';
//}