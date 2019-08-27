<?php 
require __DIR__ . '/../vendor/autoload.php';

use Client\DatabaseController as Database;
use Client\ClientController;
use Admin\AdminController as Admin;


$databaseObj = new Database();
$adminObj = new Admin();
$clientObj = new ClientController();











?>