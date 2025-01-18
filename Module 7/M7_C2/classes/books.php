<?php

class Books{
    private $dbConn;
    private $table_name = "books";

    public function __construct($databseConnection){
        $this->dbConn = $databseConnection;
    }


    public function getBooks(){
        $selectSQL = "SELECT * FROM `books`";
        $result = $this->dbConn->query($selectSQL);
        $fetchData = $result->fetch_all(MYSQLI_ASSOC);
        return $fetchData;
    }

    public function getBooksSecure(){
        $selectSQLNew = "SELECT * FROM ". $this->table_name;
        $stmt = $this->dbConn->prepare($selectSQLNew);
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return false;
        }
    }

    public function createBook($title,$price,$stock,$author_id){
        $insertSQL = "INSERT INTO `books`(`title`, `price`, `stock_quantity`, `author_id`) VALUES ('$title','$price','$stock','$author_id')";
        $result = $this->dbConn->query($insertSQL);
        return $result;
    }

    public function createBookSecure($title,$price,$stock,$author_id){
        $insertSQL = "INSERT INTO " .$this->table_name . " (`title`, `price`, `stock_quantity`, `author_id`) VALUES (?,?,?,?)";
        $stmt = $this->dbConn->prepare($insertSQL);
        
        if($stmt){
            $stmt->bind_param("ddii",$title,$price,$stock,$author_id);
            return $stmt->execute();
        }else{
            return false;
        }
        
    }


}