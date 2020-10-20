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
    </select>
    <select name="products" id="products">
        <?php foreach ($arrayOfProducts as $product):?>
            <option value="<?php echo $product->getPrice();?>"> <?php echo $product->getName();?></option>
        <?php endforeach;?>
    </select>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>