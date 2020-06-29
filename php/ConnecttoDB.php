<?php

class Connection {

    var $conn;

    function __construct() {
        $this->conn = pg_connect("ec2-52-207-25-133.compute-1.amazonaws.com' port='5432' dbname='dajh3ft7u9iliq' user='oalosbvfsppqbw' password='2c71314c36d664c405c2888905981779c6604c510855bcbdc65152b077fc4030'")
                or die("unable to connect DB");
    }
}
?>