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

        foreach ($getCustomers as $customer){
            var_dump($customer);
        }

      //  if (isset($_POST['group_id'])){
        //    $
        //}
       // if (isset($_POST['variable_discount'])){
           // $variable_discount = $_POST['variable_discount'];
       // }

       // foreach ($getCustomers as $key => $value) {
         //   echo "$key => $value\n";
        //}

   //     foreach ($getCustomerGroup as $key=>$Obj['customer_group']) {
     //      var_dump( $Obj['customer_group']->variable_discount);
       // }

        var_dump($customersGroup);
var_dump($groupId);



        require_once 'View/view.php';
    }

}

