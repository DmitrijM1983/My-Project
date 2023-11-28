<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form {
            width: 500px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            border: solid 1px darkgrey;
            border-radius: 5px;
        }

        .content {
            margin: 20px;
        }

        .button {
            display: flex;
            justify-content: space-between;
        }

        .text {
            color: red;
        }
    </style>
    <title>Music Storage</title>
</head>
<body>
    <div class="form">
        <div class="content">
            <H1>Регистрация</H1>
            <form action="src/handlers/signup.php" method="post">
                <small class="text"><?=$_SESSION['validation']['name'] ?? ''?></small>
                <div class="mb-3">
                    <input type="name" name="user_name" class="form-control" value="<?=$_SESSION['old']['name'] ?? ''?>"
                    placeholder="Введите ваше имя" required>
                </div>
                <small class="text"><?=$_SESSION['validation']['email'] ?? ''?></small>
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" value="<?=$_SESSION['old']['email'] ?? ''?>"
                    placeholder="Введите электронную почту">
                </div>
                <small class="text"><?=$_SESSION['validation']['password'] ?? ''?></small>
                <div class="mb-3">
                    <input type="password" name="password1" class="form-control"  placeholder="Введите пароль">
                </div>
                <div class="mb-3">
                    <input type="password" name="password2" class="form-control"  placeholder="Повторите пароль">
                </div>
                <div class="button">
                <div class="mb-3">
                    <button type="submit" class="btn btn-info">Зарегистрироваться</button>
                </div>
                <div class="mb-3">
                    <a href="login.php" class="btn btn-success">Войти</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// после перезагрузки очишаем сессии, чтобы не подсвечивались ошибки
$_SESSION['validation'] = [];
$_SESSION['old'] = [];