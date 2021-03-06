<?php

require "Controller/loginController.php";

class controller
{
    public function display()
    {
        $getProducts = new Product_Loader();
        $products = $getProducts->getProducts();

        $getCustomerGroup = new CustomerGroup_Loader();
        $customersGroup = $getCustomerGroup->getCustomerGroup();


        function searchGroupsArray($array, $value)
        {
            foreach ($array as $customerGroup) {
                if ($customerGroup->getId() == $value) {
                    return $customerGroup;
                }
            }
        }

        function cmp($a, $b)
        {

            return ($a->getVariableDiscount() > $b->getVariableDiscount()) ? -1 : 1;
        }

        function biggestVarDisc($array)
        {
            foreach ($array as $sorted) {
                return $arr[] = $sorted;
            }
        }

        $theEndPrice = 0;
        $whyDiscount = "";
        $varDisc = 0;
        $totalFixed = 0;
        $arrFixDisc = [];
        $arrVarDisc = [];
        $getPrice = "";
        $getName = "";

        if (isset($_GET['name'])) {
            $values = $_GET['name'];
            $result_explode = explode(',', $values);
            $groupId = $result_explode[0];
            $customerFixDiscount = $result_explode[1];
            $customerVarDiscount = $result_explode[2];
            $customerFirstName = $result_explode[3];

            if (isset($_POST['products'])) {
                $value = $_POST['products'];
                $result = explode(',', $value);
                $getPrice = $result[0];
                $getName = $result[1];

                // GET THE BIGGEST VAR DISCOUNT IN GROUP

                $obj = searchGroupsArray($customersGroup, $groupId);
                if (isset($obj)) {
                    array_push($arrVarDisc, $obj);
                    do {
                        $obj = searchGroupsArray($customersGroup, $obj->getParentId());
                        array_push($arrVarDisc, $obj);
                    } while ($obj->getParentId() !== null);
                }
                usort($arrVarDisc, "cmp");
                $groupOfBiggestVarDisc = biggestVarDisc($arrVarDisc);


                // CALCULATE FIXED AMOUNT IN GROUP

                $obj = searchGroupsArray($customersGroup, $groupId);
                if (isset($obj)) {
                    do {
                        $obj = searchGroupsArray($customersGroup, $obj->getParentId());
                        array_push($arrFixDisc, $obj->getFixedDiscount());
                    } while ($obj->getParentId() !== null);
                }
                $countedFixDiscFromGroup = array_sum($arrFixDisc);



                // CHOOSE BETTER DISCOUNT FROM THE GROUP VAR or FIXED

                $resultFix = 0;
                $resultVar = 0;
                if ($countedFixDiscFromGroup !== "") {
                    $resultFix = $getPrice - $countedFixDiscFromGroup;
                }
                if ($groupOfBiggestVarDisc->getVariableDiscount() !== "") {
                    $procentage = $getPrice * $groupOfBiggestVarDisc->getVariableDiscount() * 0.01;
                    $resultVar = $getPrice - $procentage;
                }
                $groupFixDisc = 0;
                $groupVarDisc = 0;
                if ($resultFix < $resultVar) {
                    $groupFixDisc = $countedFixDiscFromGroup;
                } else $groupVarDisc = $groupOfBiggestVarDisc->getVariableDiscount();


                // CHECK WHICH VAR DISCOUNT TO USE: GROUP OR CUSTOMER

                if ($groupVarDisc > $customerVarDiscount) {
                    $varDisc = $groupVarDisc;
                    $whyDiscount = $groupOfBiggestVarDisc->getName();
                } elseif ($groupVarDisc < $customerVarDiscount) {
                    $varDisc = $customerVarDiscount;
                    $whyDiscount = "Customer";
                }


                // SUM UP FIXED DISCOUNT

                if ($customerFixDiscount !== "") {
                    $totalFixed = $customerFixDiscount + $groupFixDisc;
                    $totalFixed;
                } else $totalFixed = $groupFixDisc;


                // CALCULATE THE PRICE

                $theEndPrice = $getPrice - $totalFixed;
                if ($varDisc !== 0) {
                    $procentage = $theEndPrice * $varDisc * 0.01;
                    $theEndPrice = $theEndPrice - $procentage;
                    $theEndPrice = number_format(max($theEndPrice, 0), 2);
                }
            }
            require 'View/view.php';
        }

    }
}

