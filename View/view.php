<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/View/style.css" type="text/css">
    <title>Price Calculator</title>
</head>
<body>


<div class="box">

    <form method="post">
        <label for="price" class="CN">Customer</label>
        <select name="name" id="name">
            <?php foreach ($customers as $customer): ?>
                <option value="<?php echo $customer->getGroupId(); ?>,<?php echo $customer->getFixedDiscount(); ?>,<?php echo $customer->getVariableDiscount(); ?>"> <?php echo $customer->getfirstName();
                    echo " ", $customer->getLastName() ?></option>
            <?php endforeach; ?>
        </select>
        <label for="price" class="PN">Product</label>
        <select name="products" id="products">
            <?php foreach ($products as $product): ?>
                <option value="<?php echo number_format($product->getPrice() / 100, 2); ?>"> <?php echo $product->getName();
                    echo " ", number_format($product->getPrice() / 100, 2); ?></option>
            <?php endforeach; ?>
        </select>

        <?php echo "<br>From: {$whyDiscount} {$varDisc}%<br>"; ?>
        <?php echo "<br>Fixed Amount: {$totalFixed}€<br>"; ?>
        <?php echo "<br>Total Price: {$theEndPrice}€<br>"; ?>


        <button class="Button">Submit</button>

        <!-- <input type="submit" value="Submit">-->

    </form>
</div>

</body>
</html>