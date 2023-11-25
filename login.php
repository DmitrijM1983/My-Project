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
        body {
            background-image: url('images/cat.jpeg');
        }

        H1 {
            color: #2d8d3d;
        }

        .form {
            width: 400px;
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
    <H1>Войти</H1>
    <form action="src/handlers/auth.php" method="post">
        <div class="mb-3">
            <small class="text"><?=$_SESSION['auth']['userError'] ?? ''?></small>
            <input type="name" name="email" class="form-control" value="<?=$_SESSION['old']['email'] ?? ''?>"
            placeholder="Введите электронную почту" required>
        </div>
        <small class="text"><?=$_SESSION['auth']['passwordError'] ?? ''?></small>
        <div class="mb-3">
            <input type="password" name="password" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="button">
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Войти</button>
            </div>
            <div class="mb-3">
                <a href="reg.php" class="btn btn-info">Зарегистрироваться</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php

$_SESSION['auth'] = [];

