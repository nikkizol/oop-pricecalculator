<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once "Model/DatabaseConnection.php";
require_once "Model/Product.php";
require_once "Model/Product_Loader.php";
require_once "Model/Customer.php";
require_once "Model/Customer_Loader.php";
require_once "Controller/controller.php";


$products = new controller();
$arrayOfProducts = $products->displayProducts();

$customers = new controller();
$arrayOfCustomers = $products->displayCustomers();

require_once 'View/view.php';





