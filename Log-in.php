<!DOCTYPE html>
<html>
    <head>
        <title> Login Form in HTML5 and CSS3</title>
        <link href="css/loginstyle.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" a href="css\font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <img src="img/logo.png"/>
            <form method="post" action="showDB.php">
                <div class="form-input">
                    <input type="text" name="username" placeholder="Enter the User Name"/> 
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="password"/>
                </div>
                <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
            </form>
        </div>
    </body>
</html>
<?php
require_once './php/ConnecttoDB.php';
$DBconnection = new Connection();

//Khởi tạo Prepared Statement
pg_query("SELECT * FROM login");
foreach(pg_query("SELECT * FROM login")as $row)
{
    if($row.['UserName']=$_POST['username']&&$row['Password]=$_POST['password'] ){
 
    }
}
?>

