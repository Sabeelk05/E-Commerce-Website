<?php
session_start();
if(!isset($_SESSION['logged_in'])){ // Check if the user is logged in
    header("Location: login.php"); // If not logged in, redirect to the login page
    exit();
}   

if(isset($_GET['logout'])){ // Check if the logout button is clicked
    session_destroy(); // Destroy the session
    header("Location: login.php");
    exit();
}

if(isset($_POST['passbtn'])){ // Check if the change password button is clicked
    include('server/config.php'); 
    $password = $_POST['Password']; // Get the new password
    $confirmPassword = $_POST['confirmPassword']; // Get the confirm password
    $user_email = $_SESSION['user_email']; // Get the user email
    if($password !== $confirmPassword){ // Check if the passwords match
        header("Location: Account.php?error= The passwords do not match");
    }
    else if(strlen($password) < 8){ // Check if the password is less than 8 characters
        header("Location: Account.php?error= The password is too short");
    }
    else{
        $stmt = $connection->prepare("UPDATE users SET user_password = ? WHERE user_email = ?"); // Update the user password
        $stmt->bind_param("ss", md5($password), $user_email); // Bind the parameters
        if($stmt->execute()){
            header("Location: Account.php?success= Your password has been changed successfully");
        }else{ 
            header("Location: Account.php?error= An error occurred: Your password could not be changed :(");
        }
    }
        
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-2 fixed-top">
        <div class="container-fluid">
            <img src="assets/WebsiteLogo.png" width="150" height="40" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AboutUs.html"> About us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html"> Contact Us </a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                        <a href="Account.php"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Account Page-->

    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold"> Account Information</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span> <?php echo $_SESSION['user_name']; ?> </span></p>
                    <p>Email: <span><?php echo $_SESSION['user_email']; ?> </span></p>
                    <p><a href="checkout.html" id="order-btn">Your Orders</a></p>
                    <p><a href="Account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <dv class=" text-center col-lg-6 col-md-12 col-sm-12">
                <form id="accountpass-form" method="POST" action="Account.php">
                    <p> <?php if(isset($_GET['error'])){
                        echo $_GET['error'];
                    } ?> </p>
                    <p> <?php if(isset($_GET['success'])){
                        echo $_GET['success'];
                    } ?> </p>
                    <h3>Change Your Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" id="account-password" name="Password"
                            placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <label>Confirm Your New Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword"
                            placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="passbtn" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </dv>
        </div>
    </section>












    <!--Footer-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>SportifyHub</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">What We Do</a></li>
                        <li><a href="#">Privvacy Policy</a></li>
                        <li><a href="#">Follow us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4> Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ'S</a></li>
                        <li><a href="#">Shipping Querys</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Shipping status</a></li>
                        <li><a href="#">Payment Options</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Shop Now </h4>
                    <ul>
                        <li><a href="#">Clothes</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4> Follow Our Socials</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/sabeelk__/"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>