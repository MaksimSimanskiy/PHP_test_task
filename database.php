<?php

class Database
{
    // укажите свои учетные данные базы данных
    private $host = "localhost";
    private $db_name = "user";
    private $username = "root";
    private $password = "secret";
    private $charset = 'utf8';
    public $conn;

    // получаем соединение с БД
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=". $this->charset, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Ошибка подключения: " . $exception->getMessage();
        }

        return $this->conn;
    }
}