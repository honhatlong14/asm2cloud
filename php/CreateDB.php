<?php
include './php/';
class CreateDb {

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // class constructor
    public function __construct(
    $dbname = "Newdb", $tablename = "Productdb", $servername = "localhost", $username = "root", $password = ""){
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        if (empty(getenv("DATABASE_URL"))) {
            echo '<p>The DB does not exist</p>';
            $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
        } else {
            echo getenv("dbname");
            $db = parse_url(getenv("DATABASE_URL"));
            $pdo = new PDO("pgsql:" . sprintf("host=ec2-18-232-143-90.compute-1.amazonaws.com;port=5432;user=fqqvdklndyrfsy;password=4035149f6e1dfc4847d4199b9adeefc24ba6840ea07cb471bdc3b1e2296b078d;dbname=db5qukadbvum23", $db["host"], $db["port"], $db["user"], $db["pass"], ltrim($db["path"], "/")
            ));
        }
        
        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if (mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)) {
                echo "Error creating table : " . mysqli_error($this->con);
            }
        } else {
            return false;
        }
    }

    // get product from the database
    public function getData() {
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

}

?>