<?php
namespace Apps\Controllers;

use Apps\Models\Belanja;
use League\Plates\Engine;

class BelanjaController {
    private $belanja;
    private $templates;

    public function __construct() {
        $this->belanja = new Belanja();
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function index() {
        echo $this->templates->render('belanja/index', ['items' => $this->belanja->getAll()]);
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->belanja->create($_POST['nama'], $_POST['harga']);
            header("Location: /");
        }
    }

    public function delete($id) {
        $this->belanja->delete($id);
        header("Location: /");
    }
}
