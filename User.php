<?php

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
        $sql = "INSERT INTO users(id,user_name, email, password,role)
        VALUES (:id,:user_name, :email, :password,:role)";
        $statement = $this->connection->prepare($sql);
        $statement->execute($array);
    }

    /**
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function login(string $email, string $password): void
    {
        $sql = "SELECT * FROM `users` WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['email' => $email]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            echo 'Пользователь не найден';
            exit;
        }
        if ($result['password'] === $password) {
            echo 'Вы вошли'; //редирект будет
        } else {
            echo 'Пароль неверен!'; // тоже
        }
    }
}