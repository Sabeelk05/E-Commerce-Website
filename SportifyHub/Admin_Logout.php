<?php
session_start();
if(isset($_GET['logout'])){ // Check if the logout button is clicked
    session_destroy(); // Destroy the session
    header("Location: Admin_Login.php"); // Redirect to the login page
    exit();
}
?>