<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price Calculator</title>
</head>
<body>
<form method="post">
    <label for="price"></label>
    <select name="name" id="name">

        <?php foreach ($customers as $customer): ?>
            <option value="<?php echo $customer->getGroupId(); ?>,<?php echo $customer->getFixedDiscount(); ?>,<?php echo $customer->getVariableDiscount(); ?>"> <?php echo $customer->getfirstName();
                echo " ", $customer->getLastName() ?></option>
        <?php endforeach; ?>
    </select>
    <select name="products" id="products">
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product->getPrice(); ?>"> <?php echo $product->getName(); ?></option>
        <?php endforeach; ?>
    </select>
    <br><?php echo $varDisc ?><br>
    <br><?php echo $totalFixed ?><br>


    <input type="submit" value="Submit">
</form>

</body>
</html>