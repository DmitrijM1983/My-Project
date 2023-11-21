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
        $sql = "INSERT INTO users(id,user_name,password,role)
        VALUES (:id,:user_name,:password,:role)";
        $statement = $this->connection->prepare($sql);
        $statement->execute($array);
    }

    /**
     *
     * @param array $array
     * @return void
     */
    public function login(array $array): void
    {
        $sql = "SELECT * FROM `users`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            if ($value['user_name'] === $array['user_name'] && $value['password'] === $array['password']) {
                echo 'Добро пожаловать!';
                break;
                } else {
                echo 'Логин или пароль не верны!';
            }
        }
    }
}







  



