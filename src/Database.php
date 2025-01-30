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
            $this->pdo = new PDO(
                "mysql:host={$config['database']['host']};dbname={$config['database']['dbname']}",
                $config['database']['username'],
                $config['database']['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if ($e->getCode() == 1049) { // Kode error database tidak ditemukan
                echo "⚠ Database belum ada. Membuat database...\n";
                $this->setupDatabase($config);
                echo "✅ Database berhasil dibuat! Silakan refresh halaman.";
                exit;
            } else {
                die("❌ Koneksi Gagal: " . $e->getMessage());
            }
        }
    }

    private function setupDatabase($config) {
        try {
            // Koneksi ke MySQL tanpa database
            $pdo = new PDO("mysql:host={$config['database']['host']}", 
                $config['database']['username'], 
                $config['database']['password']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Buat database jika belum ada
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$config['database']['dbname']}");

            // Koneksi ulang ke database yang baru dibuat
            $pdo = new PDO("mysql:host={$config['database']['host']};dbname={$config['database']['dbname']}", 
                $config['database']['username'], 
                $config['database']['password']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Buat tabel jika belum ada
            $pdo->exec("CREATE TABLE IF NOT EXISTS belanja (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nama VARCHAR(255) NOT NULL,
                harga INT NOT NULL
            )");
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
