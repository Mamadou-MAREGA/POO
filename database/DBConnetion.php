<?php

    namespace Database;
    use PDO;

    class DBConnetion {

        private $dbname;
        private $host;
        private $username;
        private $password;
        private $pdo;


        public function __construct($dbname, $host, $username, $password)
        {
            $this->dbname = $dbname;
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
        }

        public function getPDO(): PDO
        {
            return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }
    }