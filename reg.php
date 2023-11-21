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
        <H1>Регистрация</H1>
        <form action="reg.php" method="post">
        <div class="mb-3">
            <input type="email" name="user_name" class="form-control"  aria-describedby="emailHelp" placeholder="Введите email">
        </div>
        <div class="mb-3">
            <input type="password" name="password1" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <input type="password" name="password2" class="form-control"  placeholder="Повторите пароль">
        </div>
        <div class="mb-3">
            <input type="submit">
        </div>
        </form>
</body>
</html>


<?php

require_once 'User.php';

if (!empty($_POST['user_name']) && !empty($_POST['password1']) && ($_POST['password1'] === $_POST['password2'])) {
    $params = array(
        'id' => null,
        'user_name' => $_POST['user_name'],
        'password' => md5($_POST['password1']),
        'role' => 'user'
    );
    $user = new User();
    $user->registration($params);
    echo 'Вы успешно зарегистрировались';
} else {
    echo 'Заполните корректно все поля!';
}





//</div>
//        <a href="#" class="btn btn-primary" role="button" data-bs-toggle="button">Зарегистрироваться</a>
//        </form>