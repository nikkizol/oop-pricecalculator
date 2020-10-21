<?php


class Product_Loader extends DatabaseConnection
{
    private array $products = [];


    public function __construct()
    {
        $handle = $this->Connection()->prepare("SELECT * FROM product");
        $handle->execute();
        foreach ($handle->fetchAll() as $product) {
           $this->products[$product["id"]] = new Product($product['id'],$product['name'], $product['price']);
        }
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }


}