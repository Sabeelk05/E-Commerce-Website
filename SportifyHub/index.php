<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportifyHub Official Website UK</title>
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
                        <a href="login.php"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar-->

    <!-- Home Section-->
    <section id="home">
        <div class="container">
            <h5>JUST IN STOCK</h5>
            <h1>Best quality and prices</h1>
            <p>
                <b>
                    <h5>Our online shop offers the best products, with the best quality, for the best prices</h5>
                </b>
            </p>
            <button>Shop Here</button>
        </div>
    </section>

    <!--Brands Navigation Bar-->
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/nikelogo.png" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/adidaslogo.png" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/newbalancelogo.png" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/Underarmourlogo.png" />
        </div>
    </section>

    <!--Filter on home page to shop-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--First Child-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/NewBalanceShoes.png" />
                <div class="details">
                    <h2>Shoes</h2>
                    <button class="text-uppercase">
                        <h4><b>Buy Now!</b></h4>
                    </button>
                </div>
            </div>
            <!--Second Child-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/sportclothing.jpg" />
                <div class="details">
                    <h2>Clothing</h2>
                    <button class="text-uppercase">
                        <h4><b>Buy Now!</b></h4>
                    </button>
                </div>
            </div>
            <!--Third Child-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/DHat.png" />
                <div class="details">
                    <h2>Accessories</h2>
                    <button class="text-uppercase">
                        <h4><b>Buy Now!</b></h4>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!--Best Sellers-->
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

    <!--banner-->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4> Summers Collection!</h4>
            <h1> <b>Sale On Now! <br> UP TO 65% OFF</b></h1>
            <button class="text-uppercase"> shop now</button>
        </div>
    </section>

    <!--Accessories-->
    <section id="featured Accessories" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h2><b>Accessories</b></h2>
        <hr class="mx-auto">
        <p><b>Small touches with a big impact. Here are our featured accessories</b></p>
    </div>
    <?php 
    $sql = "SELECT * FROM products WHERE product_id >= 5 AND product_id <= 8"; //only show products from the database with product_id between 5 and 8
    $bsresult = $connection->query($sql); 
    if ($bsresult === false) { 
        die("Error: " . $connection->error);
    }
    ?>
    <div class="row mx-auto container-fluid">
    <?php while($row = $bsresult->fetch_assoc()) { ?> <!--//fetches the data from the database -->
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/<?php echo $row['product_image1']; ?>" /> <!--//displays the image of the product-->
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5> <!--displays the name of the product -->
            <h4 class="p-price">£<?php echo $row['product_price']; ?></h4> <!--//displays the price of the product -->
            <a href="<?php echo "one_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy Here</button></a> <!--//button to buy the product-->
        </div>
    <?php } ?>
</section>





    <!--Clothes-->
    <section id="featured Clothing" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h2><b>Clothing</b></h2>
        <hr class="mx-auto">
        <p><b>Here are some of our featured clothing</b></p>
    </div>
    <?php 
    $sql = "SELECT * FROM products WHERE product_id >= 9 AND product_id <= 12"; //same as above 
    $bsresult = $connection->query($sql);
    if ($bsresult === false) {
        die("Error: " . $connection->error);
    }
    ?>
    <div class="row mx-auto container-fluid">
    <?php while($row = $bsresult->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/<?php echo $row['product_image1']; ?>" />
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">£<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "one_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn">Buy Here</button></a>
        </div>
    <?php } ?>
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