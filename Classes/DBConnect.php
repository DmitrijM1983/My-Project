<?php

abstract class DBConnect
{
    protected \PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=127.0.0.1;dbname=music storage;charset=utf8',
                'root', '');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}