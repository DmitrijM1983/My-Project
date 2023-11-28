<?php

session_start();

class User
{
    private \PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=127.0.0.1;dbname=music storage;charset=utf8',
                'root', '');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param array $array
     *
     * @return void
     */
    public function registration(array $array): void
    {
        $_SESSION['validation'] = [];
        $checkUser = "SELECT * FROM `users` WHERE email = :email";
        $statement = $this->connection->prepare($checkUser);
        $statement->execute(['email' => $array['email']]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($array['user_name'] === $result['user_name']) {
            $_SESSION['validation']['name'] = 'Это имя уже используется!';
            header('Location: ../../reg.php');
            exit;
        } elseif ($array['email'] === $result['email']) {
            $_SESSION['validation']['email'] = 'Пользователь с такой почтой уже зарегистрирован!';
            header('Location: ../../reg.php');
            exit;
        } else {
            $sql = "INSERT INTO users(user_name, email, password,role)
        VALUES (:user_name, :email, :password,:role)";
            $statement = $this->connection->prepare($sql);
            $statement->execute($array);
            header('location: ../../login.php');
        }
    }

    /**
     *
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function login(string $email, string $password): void
    {
        $_SESSION['auth'] = [];
        $sql = "SELECT * FROM `users` WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['email' => $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            $_SESSION['auth']['userError'] = 'Пользователь не найден!';
            header('Location: ../../login.php');
        } elseif ($result['password'] != $password || empty($password)) {
            $_SESSION['auth']['passwordError'] = 'Не правильный пароль!';
            header('Location: ../../login.php');
        } else {
            $_SESSION['auth']['name'] = $result['user_name'];
            header('Location: /home.php');
        }
    }
}

