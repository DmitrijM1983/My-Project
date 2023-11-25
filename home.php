<?php

session_start();

?>

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
            margin-left: 180px;
            color: deepskyblue;
        }

        .form {
            display: flex;
            justify-content: center;
        }

        .error {
            display: flex;
            justify-content: center;
        }

        .error > div {
            width: 320px;
            height: 50px;
            background-color: red;

        .success {
            display: flex;
            justify-content: center;
        }

        .success > div {
            width: 320px;
            height: 50px;
            background-color: green;
        }
    </style>
    <title>ROCK BOX</title>
</head>
<body>
    <div class="header">
        <div class="one">
            <h1>Rock Box</h1>
        </div>
    </div>
    <h1>Привет, <?=$_SESSION['auth']['name']?>!</h1>

    <?php if ($_SESSION['auth']['role'] === 'admin'): ?>
        <div class="form">
            <form enctype="multipart/form-data" method="post" action="src/handlers/load.php">
                <input type="file" name="file" class="form-control">
                <button type="submit" class="btn btn-success">Загрузить</button>
            </form>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['validation']['typeError'])): ?>
    <div class="error">
        <div>
            <?=$_SESSION['validation']['typeError']; ?>
        </div>
    </div>
    <?php elseif (!empty($_SESSION['validation']['success'])): ?>
        <div class="success">
            <div>
                <?=$_SESSION['validation']['success']; ?>
            </div>
        </div>
    <?php endif; ?>
    <div>
        <a href="index.php" class="btn btn-secondary">Выйти</a>
    </div>
</body>
</html>

<?php

$_SESSION['validation'] = [];