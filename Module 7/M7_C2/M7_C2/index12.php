<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "online_book_store";

$conn = new mysqli($host, $username, $password, $database);


//Insert

$insertSQL = "INSERT INTO `books`(`title`, `price`, `stock_quantity`, `author_id`) VALUES ('Test Book Title','100',5,2)";
$insertResult = $conn->query($insertSQL);

if($insertResult){
    echo "Data Inserted";
}else{
    echo "Failed";
}


//Select or Read
$selectSQL = "SELECT * FROM `books`";
$result = $conn->query($selectSQL);
$fetchData = $result->fetch_all(MYSQLI_ASSOC);
$jsonData = json_encode($fetchData);

echo $jsonData;