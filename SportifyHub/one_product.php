<?php

    if(isset($_GET['product_id'])){ //If the product_id is set in the URL
        include('server/config.php'); //Include the database connection
        $product_id = $_GET['product_id']; //Get the product_id from the URL
        $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ?"); //Prepare the SQL statement
        $stmt->bind_param("i", $product_id); //Bind the product_id to the SQL statement
        $stmt->execute(); //Execute the SQL statement
        $product = $stmt->get_result(); //Get the result of the SQL statement
    }
    else{ //If the product_id is not set in the URL
        header("Location: index.php"); //Redirect to the homepage
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing this product!</title>
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

    <!--One Product. Used to display a single product in a single page, given the Product_ID of the product pressed-->
    <section class="container one-product my-5 pt-5">
        <div class="row mt-5">
            <?php while($row = $product->fetch_assoc()){ ?>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/<?php echo $row['product_image1']; ?>" id="RalphbeanieImg" /> 
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" /> 
                    </div>
                    <div class="small-img-col">
                        <img src="assets/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" />
                    </div>
                </div>
            </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6 Mens Shoes</h6>
                    <h3 class="py-4"><?php echo $row['product_name']; ?></h3> 
                    <h2>£<?php echo $row['product_price']; ?></h2> 
                    <form method="POST" action="cart.php">
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image1']; ?>" /> 
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" /> 
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" /> 
                    <input type="number" name="product_quantity"value="1" />
                    <button class="buy-btn" type="submit" name="prods_add_to_cart">Add to Cart</button> 
                    </form>
                    <h4 class="mt-5 mb-5">Product Details</h4> 
                    <span><?php echo $row['product_description']; ?></span>
                </div>
            <?php } ?>
        </div>
    </section>



    <!--Related Prods-->
    <section id="featured BestSellers" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h2><b>Best Sellers</b></h2>
            <hr class="mx-auto">
            <p><b>Below are our Best sellers</b></p>
        </div>
        <?php include('server/get_bestsellerproducts.php'); ?>
<div class="row mx-auto container-fluid">
    <?php while($row = $bsresult->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/<?php echo $row ['product_image1']?>" />
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?> </h5>
            <h4 class="p-price">£<?php echo $row['product_price'] ?>  </h4>
            <a href="<?php echo "one_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy Here</button></a>
        </div>
    <?php } ?>
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

    <script>
        var RalphbeanieImg = document.getElementById("RalphbeanieImg"); //Get the product image
        var smallImg = document.getElementsByClassName("small-img"); //Get the small images
        for (let i = 0; i < 4; i++) { //Loop through the small images
            smallImg[i].onclick = function () { //When the small image is clicked
                RalphbeanieImg.src = smallImg[i].src; //Change the product image to the small image
            }
        }
    </script>
</body>

</html>