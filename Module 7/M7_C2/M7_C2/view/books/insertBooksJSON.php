<?php
require_once '../../config/dbConfig.php';
require_once '../../classes/books.php';

$dbObj = new Database();
$databseConnection = $dbObj->getConnection();


$booksObj = new Books($databseConnection);

$data = json_decode(file_get_contents("php://input"),true);

if(isset($data['title'],$data['price'],$data['stock_qty'],$data['author_id'])){
    $title = $data['title'];
    $price = $data['price'];
    $stock = $data['stock_qty'];
    $author_id = $data['author_id'];
    
    $bookInsertResult = $booksObj->createBookSecure($title,$price,$stock,$author_id);
    
    if($bookInsertResult){
        http_response_code(201);
        echo json_encode(["message" => "Success"]);
    }else{
        http_response_code(500);
        echo json_encode(["message" => "Internal server error"]);
    }
}else{
    http_response_code(400);
    echo json_encode(["message" => "All data required"]);
}

