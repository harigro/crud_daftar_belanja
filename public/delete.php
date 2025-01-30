<?php
require '../vendor/autoload.php';

use Apps\Controllers\BelanjaController;

$controller = new BelanjaController();
$controller->delete($_POST['id']);
