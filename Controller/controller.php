<?php


class controller
{
    public function display()
    {
        $getProducts = new Product_Loader();
        $products = $getProducts->getProducts();

        $getCustomers = new Customer_Loader();
        $customers = $getCustomers->getCustomers();


        if (isset($_POST['name'])){
            $groupId = $_POST['name'];
        }

//var_dump($groupId);
        require_once 'View/view.php';
    }

}

