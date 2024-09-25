<?php
session_start();
include('server/config.php'); 

if(isset($_SESSION['logged_in'])){ // Check if the user is already logged in
    header("Location: Account.php"); // If the user is already logged in, redirect them to the account page
    exit();
}

if(isset($_POST['loginbtn'])){  // Check if the login button is clicked
    $email = $_POST['Email']; // Get the values from the form
    $password = md5($_POST['Password']); 

    // Check if email exists
    $stmt = $connection->prepare("SELECT user_id FROM users WHERE user_email = ?"); 
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows() == 0){
        header("Location: Registerform.php?error= There isn't an account linked to this email, please register");
        exit();
    }
    $stmt->close();

    // Check password
    $stmt = $connection->prepare("SELECT user_id,user_name, user_email, user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param("ss", $email, $password); // Bind the email and password to the statement
    if($stmt->execute()){
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password); // Bind the results to the variables
        $stmt->store_result();
        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['user_id'] = $user_id; // Set the session variables
            $_SESSION['user_name'] = $user_name; 
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true; 
            header("Location: Account.php?login=You have logged in successfully!");
        }else{
            header("Location: login.php?error= The email or password is incorrect");
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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

    <!--Login Form, used for already registered users to login to their accounts-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">User Log In</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">
                <p>
                    <?php
                    if(isset($_GET['error'])){
                        echo $_GET['error'];
                    }
                    ?>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="Email" placeholder="Email"
                        required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="Password"
                        placeholder="Password" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" name="loginbtn" value="Login" />
                </div>
                <div class="form-group">
                    <a id="register-url" href="Registerform.php" class="btn"> No Account? Register Now</a>
                </div>
                <div class="form-group">
                    <a id="admin-login" href="Admin_Login.php" class="btn"> Admin Login</a>
                </div>
            </form>
            </form>
            </form>
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