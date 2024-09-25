<?php
session_start(); 
include('server/config.php'); // Include the database connection file

if(isset($_SESSION['logged_in'])){ // Check if the user is already logged in
    header("Location: Account.php"); // If the user is already logged in, redirect them to the account page
    exit();
}

if(isset($_POST['register'])){  // Check if the register button is clicked
    $name = $_POST['Name'];  // Get the values from the form
    $email = $_POST['Email']; 
    $password = $_POST['Password']; 
    $confirmPassword = $_POST['Confirm_Password']; 
    if($password !== $confirmPassword){ // Check if the passwords match
        header("Location: Registerform.php?error= The passwords do not match"); 
    }
    else if(strlen($password) < 8){ // Check if the password is less than 8 characters
        header("Location: Registerform.php?error= The password is too short");
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Check if email is valid
        header("Location: Registerform.php?error= The email is not valid");
    }
    else{ 
        $stmt = $connection->prepare("SELECT count(*) FROM users WHERE user_email = ?"); // Check if the email already exists
        $stmt->bind_param("s", $email); // Bind the email to the statement
        $stmt->execute();
        $stmt-> bind_result($num_rows); 
        $stmt->fetch();
        $stmt->close(); // Close the first statement
        if($num_rows > 0){ // If the email already exists
            header("Location: Registerform.php?error= This email already has an account registered to it");
        }else{ // If the email does not exist
            $stmt1 = $connection->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)"); // Insert the user into the database
            $stmt1->bind_param("sss", $name, $email, md5($password)); // Encrypt the password
            if($stmt1->execute()){ // If the user is registered
                $_SESSION['user_email'] = $email; // Set the session variables
                $_SESSION['user_name'] = $name; 
                $_SESSION['logged_in'] = true;
                header("Location: Account.php?register=You Have Registed Successfuly!"); // Redirect the user to the account page
            }else{
                header("Location: Registerform.php?error= An error occurred: Your account could not be registered :("); 
            }
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigation Bar-->
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

    <!-- Form that is used for user registration-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="Registerform.php" >
                <p> <?php if(isset($_GET['error'])){
                    echo $_GET['error'];
                } ?> </p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="Name" placeholder="Name"
                        required />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="Email" placeholder="Email"
                        required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="Password"
                        placeholder="Password" required />
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="Confirm_Password"
                        placeholder="Confirm Password" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn"> Already Have An Account? Log In</a>
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