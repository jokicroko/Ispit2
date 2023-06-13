<?php
class Connection 
{
    private static $instance = null;
    private $pdo;

    private function __construct($config) {
        try {
            $this->pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error while connecting to database' . $e->getMessage();
        }
    }

    public static function getInstance($config) {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>