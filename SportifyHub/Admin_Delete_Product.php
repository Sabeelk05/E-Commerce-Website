<?php
include('server/config.php');
session_start();

if(isset($_GET['product_id'])){ // Check if the product_id is set
    $product_id = $_GET['product_id']; // Get the product_id
    $stmt1 = $connection->prepare("DELETE FROM products WHERE product_id = ?"); // Delete the product with the product_id
    $stmt1->bind_param("i", $product_id);
    if($stmt1->execute()){    
    header("Location: Admin_Products.php?");
}
}
else{
    header("Location: Admin_Products.php");
    exit();
}




?>