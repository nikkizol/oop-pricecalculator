<?php


class controller
{
    public function display()
    {
        $getProducts = new Product_Loader();
        $products = $getProducts->getProducts();

        $getCustomers = new Customer_Loader();
        $customers = $getCustomers->getCustomers();

        $getCustomerGroup = new CustomerGroup_Loader();
        $customersGroup = $getCustomerGroup->getCustomerGroup();

        if (isset($_POST['name'])) {
            $groupId = $_POST['name'];

        }
        require_once 'View/view.php';
    }

}

