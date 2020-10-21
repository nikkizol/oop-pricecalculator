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


        function objArraySearch($array, $value)
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

        $arrFixDisc = [];
        $arrVarDisc = [];
        if (isset($_POST['name'])) {
            $groupId = $_POST['name'];
            $result_explode = explode(',', $groupId);
            var_dump($result_explode);

            // GET THE BIGGEST % DISCOUNT
            $obj = objArraySearch($customersGroup, $groupId);
            if ($obj->getVariableDiscount() == null) {
                $obj = objArraySearch($customersGroup, $groupId);
                array_push($arrVarDisc, $obj);
                do {
                    $obj = objArraySearch($customersGroup, $obj->getParentId());
                    array_push($arrVarDisc, $obj);
                } while ($obj->getParentId() !== null);

            } elseif ($obj->getVariableDiscount() !== null) {
                $obj = objArraySearch($customersGroup, $groupId);
                array_push($arrVarDisc, $obj);
                do {
                    $obj = objArraySearch($customersGroup, $obj->getParentId());
                    array_push($arrVarDisc, $obj);
                } while ($obj->getParentId() !== null);
            }

            usort($arrVarDisc, "cmp");
            $biggestVarDisc = biggestVarDisc($arrVarDisc);
            var_dump($biggestVarDisc->getVariableDiscount());
            if ($biggestVarDisc->getVariableDiscount() !== null) {
                if ($biggestVarDisc->getVariableDiscount() > $result_explode[2]) {
                    $varDisc = $biggestVarDisc->getVariableDiscount();
                     $varDisc;
                } else $varDisc = $result_explode[2];
            }

            // CALCULATE FIXED AMOUNT

            $obj = objArraySearch($customersGroup, $groupId);
            if ($obj->getFixedDiscount() == null) {
                $obj = objArraySearch($customersGroup, $groupId);
                array_push($arrFixDisc, $obj->getFixedDiscount());
                do {
                    $obj = objArraySearch($customersGroup, $obj->getParentId());
                    array_push($arrFixDisc, $obj->getFixedDiscount());
                } while ($obj->getParentId() !== null);

            } elseif ($obj->getFixedDiscount() !== null) {
                $obj = objArraySearch($customersGroup, $groupId);
                array_push($arrFixDisc, $obj->getFixedDiscount());
                do {
                    $obj = objArraySearch($customersGroup, $obj->getParentId());
                    array_push($arrFixDisc, $obj->getFixedDiscount());
                } while ($obj->getParentId() !== null);
            }
            var_dump($arrFixDisc);
            var_dump(array_sum($arrFixDisc));
            $countedFixDiscFromGroup = array_sum($arrFixDisc);
            if ($result_explode[1] !== "") {
                $totalFixed = $result_explode[1] + $countedFixDiscFromGroup;
                  $totalFixed;
            } else $totalFixed = $countedFixDiscFromGroup;
        }


        require_once 'View/view.php';
    }

}

