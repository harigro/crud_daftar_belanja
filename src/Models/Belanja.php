<?php
namespace Apps\Models;

use Apps\Database;
use PDO;

class Belanja {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM belanja");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama, $harga) {
        $stmt = $this->db->prepare("INSERT INTO belanja (nama, harga) VALUES (?, ?)");
        return $stmt->execute([$nama, $harga]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM belanja WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
