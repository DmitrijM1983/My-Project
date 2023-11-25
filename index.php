<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .header {
            height: 120px;
            background-image: url('images/gitar.jpeg');
            border-radius: 8px;
            justify-content: space-between;
            display: flex;
            align-items: center;
        }

        h1 {
            color: deepskyblue;
        }

        .one {
            margin: 0 180px;
        }
    </style>
    <title>Music Storage</title>
</head>
<body>
    <div class="header">
        <div class="one">
            <h1>Rock Box</h1>
        </div>
        <div class="one">
            <a href="login.php"  class="btn btn-success">Войти</a>
            <a href="reg.php"  class="btn btn-info">Зарегистрироваться</a>
        </div>
    </div>
</body>
</html>

<?php

//session_start();

//require_once 'autoload.php';