<?php

class Connection {

    var $conn;

    function __construct() {
        $this->conn = pg_connect("ec2-52-0-155-79.compute-1.amazonaws.com' port='5432' dbname='degqr6nn9k3ku6' user='znoybklepfqngm' password='5402806e8c417fec226a70d0e105e0cc2d310656ede7dba1c655cf522688f20c'")
                or die("unable to connect DB");
    }
}
?>