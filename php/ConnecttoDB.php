<?php

class Connection {
public $pdo;
    function __construct() {
        if (empty(getenv("DATABASE_URL"))) {
            echo '<p>The DB does not exist</p>';
            $this->pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
        } else {
            echo '<p>The DB exists</p>';
            echo getenv("dbname");
            $db = parse_url(getenv("DATABASE_URL"));
            $this->pdo = new PDO("pgsql:" . sprintf(
                            "host=ec2-52-207-25-133.compute-1.amazonaws.com;port=5432;user=oalosbvfsppqbw;password=2c71314c36d664c405c2888905981779c6604c510855bcbdc65152b077fc4030;dbname=dajh3ft7u9iliq", $db["host"], $db["port"], $db["user"], $db["pass"], ltrim($db["path"], "/")
            ));
        }
    }

}
