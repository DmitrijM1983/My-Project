<?php

session_start();
require_once 'autoload.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
    <title>Главный пэйдж</title>
</head>
<body>
<h1>Привет, <?=$_SESSION['auth']['name'];?>!</h1>
<p>Форма загрузки файлов</p>
<form enctype="multipart/form-data" method="post" action="src/handlers/load.php">
    <p><input type="file" name="file">
        <input type="submit" value="Отправить"></p>
</form>
<p class="text"><?=$_SESSION['validation']['typeError'] ?? ''?></p>
<p class="success"><?=$_SESSION['file']['loadSuccess'] ?? ''?></p>
<p class="text"><?=$_SESSION['file']['loadError'] ?? ''?></p>
</body>
</html>

<?php

$_SESSION['validation'] = [];
$_SESSION['file'] = [];