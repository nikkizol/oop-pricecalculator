<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <title>Price Calculator</title>
</head>
<body>


<div class="box">

    <form method="post">
        <div class="CL">
            <label for="name" id="labelName">Customer</label><br>
            <select name="name" id="name">
                <?php foreach ($customers as $customer): ?>
                    <option value="<?php echo $customer->getGroupId(); ?>,<?php echo $customer->getFixedDiscount(); ?>,<?php echo $customer->getVariableDiscount(); ?>"> <?php echo $customer->getfirstName();
                        echo " ", $customer->getLastName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="CN">
            <label for="products" id="labelProduct">Product</label><br>
            <select name="products" id="products">
                <?php foreach ($products as $product): ?>  number_format($product->getPrice() / 100, 2)
                    <option value="<?php echo number_format($product->getPrice() / 100, 2); ?>"> <?php echo $product->getName();
                        echo " ", number_format($product->getPrice() / 100, 2); ?></option>
                <?php endforeach; ?>
            </select>

        </div>


        <br><?php echo "From: ", $whyDiscount;
        echo " ", $varDisc;
        echo "%"; ?><br>
        <br><?php echo "Fixed Amount: ", $totalFixed;
        echo "€"; ?><br>
        <br><?php echo "Total Price: ", number_format(max($theEndPrice, 0), 2);
        echo "€"; ?><br>

        <button class="Button">Submit</button>
    </form>
</div>

<footer class="footer">
    &copy; NIKITA & DWAYNE  <?php echo date('Y')?>
</footer>
</body>
</html>

</body>
</html>