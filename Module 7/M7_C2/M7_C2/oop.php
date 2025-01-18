<?php

class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "online_book_store";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if($this->conn->connect_error){
            die("Connection Failed");
        }
    }

    public function getConnection(){
        return $this->conn;
    }

}

class Books{
    private $dbConn;

    public function __construct($databseConnection){
        $this->dbConn = $databseConnection;
    }


    public function getBooks(){
        $selectSQL = "SELECT * FROM `books`";
        $result = $this->dbConn->query($selectSQL);
        $fetchData = $result->fetch_all(MYSQLI_ASSOC);
        $jsonData = json_encode($fetchData);
        echo $jsonData;
    }
}


$dbObj = new Database();
$databseConnection = $dbObj->getConnection();


$booksObj = new Books($databseConnection);
$booksObj->getBooks();



