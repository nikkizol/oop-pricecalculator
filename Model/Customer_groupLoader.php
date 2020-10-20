<?php


class Customer_groupLoader extends DatabaseConnection
{
    private array $customer_group;

    /**
     * Customer_groupLoader constructor.
     * @param array $customer_group
     */
    public function __construct(array $customer_group)
    {

        $handle = $this->connection()->prepare("SELECT * FROM customer_group");
        $handle->execute();
        foreach ($handle->fetchAll() as $customer_group) {
            $customer_group[] = $customer_group['id'];
    }
    }


    /**
     * @return array
     */
    public function getCustomerGroup(): array
    {
        return $this->customer_group;
    }





}