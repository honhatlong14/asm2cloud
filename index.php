<!DOCTYPE html>
<html lang="en">
    <head>
        <!--conduct the website-->
        <meta charset="UTF-8">
        <a href="ConnectToDB.php">Connect to database</a>
        <a href="InsertData.php">Insert to database</a>
        <a href="DeleteData.php">Delete in database</a>
        <a href="UpdateData.php">Update database</a>
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
    <body>

        <!-- This department is used for fitting and styling for website.-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!------programming code-------->
        <!---------Navigation-bar-menu---------->
        <?php
        require_once './php/header.php';
        ?>
        <!----Product department Reference------>
        <!----Product department Reference------>
        <div class="container">
            <div class="row text-center py-5">
                <!-----Product--------------->
                <?php
                require_once './php/components.php';
                component("./img/Aqua.png", 1, "Aqua 4-in-1 Monterey Hammock", "Aqua 4-in-1 Monterey Hammock Inflatable Pool Float, Multi-Purpose Pool Hammock (Saddle, Lounge Chair, Hammock, Drifter) Pool Chair, Portable Water Hammock, Light Blue/White Stripe", "$52.17", "35.99");
                component("./img/ball_color.png", 2, "Ball Color", "Schylling Nee Doh Stress Ball Colors Shipped Randomly Stress Ball", "5.59", "2.97");
                component("./img/card_game.png", 3, "SKIP BO Card Game", "Skip-Bo is the ultimate sequencing card game!", "7.99", "$27.28");
                component("./img/codenames.png", 4, "Czech Games Codenames", "For 2 8+ players", "19.95", "15.26");
                component("./img/coop_hydoro.png", 5, "COOP Hydro Lacrosse Game Set", "FUN OUTDOOR GAME: Lacrosse game set is perfect for pool, beach, or backyard play.", "12.97", "10.00");
                component("./img/Floating_Swim_Hammock_for_Pool.png", 6, "SwimWays Original Spring Float ", "Floating Swim Hammock for Pool or Lake - Light Blue/Dark Blue", "44.99", "25.11");
                component("./img/intex_river_run.png", 7, "Intex River Run I Sport Lounge", "Have fun floating in the pool or at the lake with the Index River run I", "29.00", "20.00");
                component("./img/iron_man.png", "Funko Pop! Avengers Endgame", 8, "I Am Iron Man Glow-in-The-Dark Deluxe Vinyl Figure, Multicolored", "18.95", "14.99");
                component("./img/Swin_Lounger.png", 9, "SwimWays Spring Float Recliner", "Swim Lounger for Pool or Lake - Dark Blue/Light Blue", "102.99", "95.29");
                component("./img/thinkfun.png", 10, "ThinkFun Gravity Maze Marble Run Brain Game and STEM Toy", "For Boys and Girls Age 8 and Up – Toy of the Year Award Winner", "57.40", "29.95");
                ?>
                <a href="./php/AddProduct.php">BROWER THE PRODUCT</a>
                <?php
                require_once './php/ConnecttoDB.php';
                $connect = new Connection();
                $sql = "INSERT INTO product(ProductID,ProductName,Price,Quantity)"
                        ." VALUES('$_POST[$productid]','$_POST[$productname]','$_POST[$productprice]','$_POST[$count]')";
                $stmt = $pdo->prepare($sql);
                if (is_null($_POST[$productid])) {
                    echo "ProductID must be not null";
                } else {
                    if ($stmt->execute() == TRUE) {
                        echo "Record inserted successfully.";
                    } else {
                        echo "Error inserting record: ";
                    }
                }
                ?>
                <div class="upload" name="upload">
                    <a href="AddProduct.php">ADD NEW PRODUCT</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
session_start();
if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "ProductID");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>