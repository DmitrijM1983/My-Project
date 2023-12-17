<?php

session_start();
$_SESSION['file'] = [];
class File
{
    /**
     * @param string $tmp
     * @param string $name
     *
     * @return void
     */
    public function checkFile(string $tmp, string $name): void
    {
        $files = scandir( __DIR__ . '..\..\mp3Files');
        foreach ($files as $file) {
            if ($file === $name) {
                $_SESSION['file']['loadError'] = 'Файл уже существует!';
                header('Location: ../../home.php');
            }
        }
        if (!isset($_SESSION['file']['loadError'])) {
            $this->load($tmp, $name);
        }
    }

    /**
     * @param string $tmp
     * @param string $name
     *
     * @return void
     */
    public function load(string $tmp, string $name): void
    {
        if (move_uploaded_file($tmp,  __DIR__ . '..\..\mp3Files\\' . $name)) {
            $_SESSION['file']['loadSuccess'] = 'Файл успешно загружен!';
        } else {
            $_SESSION['file']['loadError'] = 'Файл не загружен!';
        }
        header('Location: ../../home.php');
    }
}