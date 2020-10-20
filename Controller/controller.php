<?php


class controller
{
    public function displayProducts()
    {
        $getProducts = new Product_Loader();
        $products = $getProducts->getProducts();
        return $products;
    }

    public function displayCustomers() {
        $getCustomers = new Customer_Loader();
        $customers = $getCustomers->getCustomers();

        return $customers;


    }
}

