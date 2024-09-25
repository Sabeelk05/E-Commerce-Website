<?php
include('server/config.php');
session_start();

if(isset($_GET['user_id'])){ // Check if the user_id is set
    $user_id = $_GET['user_id']; // Get the user_id
    $stmt1 = $connection->prepare("DELETE FROM users WHERE user_id = ?"); // Delete the user with the user_id
    $stmt1->bind_param("i", $user_id); // Bind the parameters
    if($stmt1->execute()){    
    header("Location: Admin_Users.php?");
}
}
else{
    header("Location: Admin_Users.php");
    exit();
}




?>