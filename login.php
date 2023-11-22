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
            <input type="name" name="email" class="form-control" placeholder="Введите электронную почту">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Войти</button>
        </div>
    </form>
</body>
</html>

<?php

require_once 'User.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = new User();
    $user->login($email, $password);
} else {
    echo 'Заполните корректно все поля!';
}