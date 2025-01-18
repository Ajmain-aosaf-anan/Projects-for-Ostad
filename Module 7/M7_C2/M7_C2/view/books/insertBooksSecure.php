<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

$dbObj = new Database();
$databseConnection = $dbObj->getConnection();


$booksObj = new Books($databseConnection);

if(isset($_POST['title'],$_POST['price'],$_POST['stock_qty'],$_POST['author_id'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stock = $_POST['stock_qty'];
    $author_id = $_POST['author_id'];
    
    $bookInsertResult = $booksObj->createBookSecure($title,$price,$stock,$author_id);
    
    if($bookInsertResult){
        echo json_encode(["message" => "Success"]);
    }else{
        echo json_encode(["message" => "Internal server error"]);
    }
}else{
    echo json_encode(["message" => "All data required"]);
}

