<?php


class CustomerGroup_Loader extends DatabaseConnection
{
    private array $customersGroup = [];


    public function __construct()
    {
        $handle = $this->connection()->prepare("SELECT * FROM customer_group");
        $handle->execute();
        foreach ($handle->fetchAll() as $customerGroup) {
            $this->customersGroup[$customerGroup["id"]] = new Customer_group($customerGroup["id"], $customerGroup["name"], $customerGroup["parent_id"], $customerGroup["fixed_discount"], $customerGroup["variable_discount"]);
    }
    }

    /**
     * @return array
     */
    public function getCustomerGroup(): array
    {
        return $this->customersGroup;
    }





}