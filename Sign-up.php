<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login Form in HTML5 and CSS3</title>
        <link href="css/salewebstyle.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <img src="img/logo.png"/>
            <form method="POST" action="Sign-up.php">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter the User Name"/> 
                </div>
                <div class="form-input">
                    <input type="text" name="userID" placeholder="Text your wanted number"/> 
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="password"/>
                </div>
                <input type="submit" value="SIGN-UP" class="btn-signup" name="signup"/>
            </form>
        </div>
    </body>
</html>


<?php
require_once 'php/ConnecttoDB.php';
$connect = new Connection();
//Khởi tạo Prepared Statement
//$stmt->execute();
if (isset($_POST['signup'])) {
    $sql = "INSERT INTO login(customer_id,user_name,password)"
            . " VALUES('$_POST[userID]','$_POST[username]','$_POST[password]')";
    echo ($sql);
    $stmt = $connection->pdo->prepare($sql);
//$stmt->execute();
    if (is_null($_POST['userID'])) {
        echo "ID must be not null";
    } else {
        if ($stmt->execute() == TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error inserting record: ";
        }
    }
}
?>
<table class="table table-bordered table-condensed" width="50%" border="1" cellpadding="5" cellspacing="5" >
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>User Name</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
// tạo vòng lặp
        require_once'ConnecttoDB.php';
        $connection = new Connection();
        $sql = "SELECT * FROM login";
        $stmt = $connection->pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        echo '<p>login user information:</p>';
        foreach ($resultSet as $row) {
            ?>

            <tr>
                <td scope="row"><?php echo $row['customer_id'] ?></td>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['password'] ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


