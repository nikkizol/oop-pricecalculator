<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//require 'Model/Customer.php';
//require 'Model/Customer_Loader.php';

class LoginController
{
    public function displayLogin()
    {
        $getCustomers = new Customer_Loader();
        $customers = $getCustomers->getCustomers();

        require_once 'view/login.php';
    }
}
