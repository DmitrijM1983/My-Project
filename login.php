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

        .button {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <title>Music Storage</title>
</head>
<body>
<div class="form">
    <H1>Войти</H1>
    <form action="src/actions/login.php" method="post">
        <div class="mb-3">
            <input type="name" name="email" class="form-control" placeholder="Введите электронную почту" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="button">
            <div class="mb-3">
                <button class="btn btn-success">Войти</button>
            </div>
            <div class="mb-3">
                <a href="reg.php" class="btn btn-info">Зарегистрироваться</a>
            </div>
        </div>
    </form>
</body>
</html>

