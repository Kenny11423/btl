<?php
class Database {
    private $host = "localhost";
    private $username = "admin";
    private $password = "123456";
    private $dbname = "tech-shop";

    public function getConnection() {
        return mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );
    }
}