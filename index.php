<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'View/view.php';
require_once "Model/DatabaseConnection.php";
require_once "Model/Product.php";
require_once "Model/Product_Loader.php";

$getProducts = new Product_Loader();
$products = $getProducts->getProducts();
var_dump($products);



