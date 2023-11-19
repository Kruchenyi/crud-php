<?php

namespace myfrm;

use PDOStatement;
use PDO;
use PDOException;


class Db
{
    private $connection;
    private static $instance = NULL;
    private PDOStatement $stmt;
    public static function getInstance()
    {
        if (self::$instance === NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public function __wakeup()
    {
    }
    public function getConnection()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=pdo-practic";
            $this->connection = new PDO($dsn, 'root', 'root', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            return $this;
        } catch (PDOException $e) {
            echo "ERROR : $e";
        }
    }
    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }
    public function find()
    {
        return $this->stmt->fetch();
    }
    public function findAll()
    {
        return $this->stmt->fetchAll();
    }
    public function allRowCount()
    {
        return $this->stmt->rowCount();
    }
}
