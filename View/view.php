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
    <h3>Hi <?php echo $customerFirstName;?></h3>
    <form method="post">
        <div class="CN">
            <label for="products" id="labelProduct">Product</label><br>
            <select name="products" id="products">
                <?php foreach ($products as $product): ?>
                    <option value="<?php echo number_format($product->getPrice() / 100, 2);?>,<?php echo $product->getName();?>"> <?php echo $product->getName();
                        echo ": ", number_format($product->getPrice() / 100, 2); ?>€
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>Product: <?php echo ucfirst($getName); echo ": ", $getPrice;?>€<br>
        <?php echo "<br>From: {$whyDiscount} {$varDisc}%<br>"; ?>
        <?php echo "<br>Fixed Amount: {$totalFixed}€<br>"; ?>
        <?php echo "<br>Total Price: {$theEndPrice}€<br>"; ?>
        <button class="Button">Submit</button>
    </form>
</div>


<footer class="footer">
    &copy; NIKITA & DWAYNE  <?php echo date('Y')?>
</footer>
</body>
</html>
