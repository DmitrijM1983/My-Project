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
        $sql = "INSERT INTO users(user_name, email, password,role)
        VALUES (:user_name, :email, :password,:role)";
        $statement = $this->connection->prepare($sql);
        $statement->execute($array);
    }

    /**
     *
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login(string $email, string $password): void
    {
        $_SESSION['result'] = [];
        $sql = "SELECT * FROM `users` WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['email' => $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            $_SESSION['result']['userError'] = 'Пользователь не найден!';
            header('Location: ../../login.php');
        } elseif ($result['password'] != $password || empty($password)) {
            $_SESSION['result']['passwordError'] = 'Не правильный пароль!';
            header('Location: ../../login.php');
        } else {
            $_SESSION['result']['name'] = $result['user_name'];
            header('Location: /home.php');
        }
    }
}