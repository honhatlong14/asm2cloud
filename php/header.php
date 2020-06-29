<!DOCTYPE html>
<html lang="en">
    <head>
        <!--conduct the website-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Toyworld shopping cart</title>
        <!--Link to css file--->
        <link href="css/salewebstyle.css" rel="stylesheet" type="text/css">

        <!--Bootstrap CDN--->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!--Font Awesome--->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">

        <link href="php/components.php">
    </head>
    <header id = "header">
        <div class="top-nav-bar">
            <img class="logo" src="img/logo.png" alt="logo">
            <span>
                <span class="menu-bar">
                    <ul>
                        <li><a href="Cart.php"><i class="fas fa-shopping-cart"></i>Cart
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                    } else {
                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                    }
                                    ?>
                                </a>
                        </li>
                        <li><a href = "Sign-up.php">Sign up</a></li>
                        <li><a href = "Log-in.php">Log in</a></li>
                        <li><a href = "CheckReceipt.php" target = "_blank">Check Receipt</a></li>
                    </ul>
                </span>
            </span>
        </div>
    </header>
</html>


