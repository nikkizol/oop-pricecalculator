<?php


class controller
{
    public function display()
    {
        $getProducts = new Product_Loader();
        $products = $getProducts->getProducts();
        return $products;


    }
}

