<?php
namespace Apps;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require __DIR__ . '/config.php';
        try {
            $this->pdo = new PDO("mysql:host={$config['database']['host']}", $config['database']['username'], $config['database']['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS {$config['database']['dbname']}");
            // Menggunakan database yang baru dibuat
            $this->pdo->exec("USE {$config['database']['dbname']}");
            $this->pdo->exec("
                CREATE TABLE IF NOT EXISTS {$config['database']['dbname']} (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nama VARCHAR(100) NOT NULL,
                    harga INT NOT NULL
                );
            ");

        } catch (PDOException $e) {
            die("❌ Gagal membuat database: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}
