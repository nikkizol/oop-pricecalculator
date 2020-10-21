<?php


class Customer_Loader extends DatabaseConnection
{
    private array $customers = [];


    public function __construct()
    {
        $handle = $this->Connection()->prepare("SELECT * FROM customer");
        $handle->execute();
        foreach ($handle->fetchAll() as $customer) {
            $this->customers[$customer["id"]] = new Customer($customer['id'], $customer['firstname'], $customer['lastname'], $customer['group_id'], $customer['fixed_discount'], $customer['variable_discount']);
        }
    }

    /**
     * @return array
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }


}


