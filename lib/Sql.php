<?php

class Sql extends PDO {

    private $conn;

    // Connect
    public function __construct(){
        $this -> conn = new PDO("mysql:dbname=db_php7;host=localhost","root","");
    }

    private function setParams($statement, $parameters = array()){
        foreach($parameters as $key => $value){
            $this -> setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value){
        $statement -> bindParam($key, $value);
    }

    // Query
    public function query($rawQuery, $params = array()){
        $stmt = $this -> conn -> prepare($rawQuery);
        $this -> setParams($stmt, $params);

        $stmt -> execute();

        return $stmt;

    }

    // Select
    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this -> query($rawQuery, $params);

        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

}

?>