<?php

session_start();
require_once 'DBConnect.php';

class User extends DBConnect
{

    /**
     * @param $array
     *
     * @return void
     */
    public function checkUser($array): void
    {
        $_SESSION['validation'] = [];
        $checkName = "SELECT `user_name` FROM `users`";
        $statement = $this->connection->prepare($checkName);
        $statement->execute();
        $arrayNames = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($arrayNames as $arrayName) {
            if ($arrayName['user_name'] === $array['user_name']) {
                $_SESSION['validation']['name'] = 'Это имя уже используется!';
                header('Location: ../../reg.php');
                exit;
            }
        }
        $checkEmail = "SELECT `email` FROM `users`";
        $statement = $this->connection->prepare($checkEmail);
        $statement->execute();
        $arrayEmails = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($arrayEmails as $arrayEmail) {
            if ($arrayEmail['email'] === $array['email']) {
                $_SESSION['validation']['email'] = 'Пользователь с такой почтой уже зарегистрирован!';
                header('Location: ../../reg.php');
                exit;
            }
        }
        $this->registration($array);
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
        header('location: ../../login.php');
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
        $_SESSION['validation'] = [];
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
            $_SESSION['validation']['role'] = $result['role'];
            header('Location: ../../home.php');
        }
    }
}

