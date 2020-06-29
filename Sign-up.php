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
            <form method="POST" action="InsertData.php">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter the User Name"/> 
                </div>
                <div class="form-input">
                    <input type="text" name="userID" placeholder="Text your wanted number"/> 
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="password"/>
                </div>
                <div class="form-input">
                    <input type="password" name="repeat-password" placeholder="Repeat password"/>
                </div>
                <input type="submit" value="SIGN-UP" class="btn-signup" name="signup"/>
            </form>
        </div>
    </body>
</html>
<?php
require_once 'php/ConnecttoDB.php';
$connect = new Connection();
$pdo = $connect->connect();
//Khởi tạo Prepared Statement
$sql = "INSERT INTO login(CustomerID, UserName,Password)"
        . "VALUES('$_POST[userID]','$_POST[username]','$_POST[password]')";
$stmt = $pdo->prepare($sql);
//$stmt->execute();
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $customerid = $_POST['userid'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['repeat-password'];
    if (empty($username) || empty($customerid) || empty($password) || empty($passwordrepeat)) {
        header("Location:../signup.php?error=emptyfield&username =".$username)
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:../signup.php?error=invalidmail&username =".$username)
    }
}
?>


