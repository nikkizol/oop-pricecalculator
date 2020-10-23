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
    <form method="get">
        <h1 for="name">Welcome</h1><br>
        <label for="name" id="name">Select your name:</label><br>-->
        <select class='option-box' id="name" name="name">
            <?php foreach ($customers as $customer): ?>
                <option value="<?php echo $customer->getGroupId();?>,<?php echo $customer->getFixedDiscount();?>,<?php echo $customer->getVariableDiscount();?>,<?php echo $customer->getfirstName()?>"> <?php echo $customer->getfirstName();
                    echo " ", $customer->getLastName() ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Log in" class="btn">
    </form>
</div>
</body>
</html>