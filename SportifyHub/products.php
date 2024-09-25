<?php
include('server/config.php'); // including the config.php file
$total_no_of_pages = 1;
if (isset($_POST['filterbtn'])) { // if the filter button is clicked
    $categories = $_POST['categories'] ?? ''; // get the category selected by the user
    if (!empty($categories)) { // if the category is not empty
        $stmt = $connection->prepare("SELECT * FROM products WHERE product_category = ?"); // select all products from the products table where the product category is equal to the category selected by the user
        $stmt->bind_param("s", $categories); // bind the category to the query
    } else { 
        $stmt = $connection->prepare("SELECT * FROM products"); // select all products from the products table
    }
} else { 
    $page_number = max(1, $_GET['page_number'] ?? 1); // get the page number from the URL
    $total_products_per_page = 8;  // number of products per page. The Lower the number, the more pages there will be
    $offset = ($page_number - 1) * $total_products_per_page; // calculate the offset

    $stmt1 = $connection->prepare("SELECT COUNT(*) AS total_records FROM products"); // select the total number of records from the products table
    $stmt1->execute(); 
    $stmt1->bind_result($total_records); 
    $stmt1->fetch();
    $stmt1->close();

    $total_no_of_pages = ceil($total_records / $total_products_per_page); // calculate the total number of pages
    $stmt = $connection->prepare("SELECT * FROM products LIMIT ?, ?"); // select all products from the products table with a limit
    $stmt->bind_param("ii", $offset, $total_products_per_page); // bind the offset and the total records per page to the query
}

$stmt->execute(); 
$result = $stmt->get_result(); // get the result
if (!$result) { 
    echo "Error: " . $connection->error;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing Products</title>
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

    <!-- Filter Search used by customers-->
    <section id="filter-search" class="my-5 py-5 ms-2"> 
        <div class="container text-center mt-5 py-5">
            <p><b>Filter The Products</b></p>
            <hr>
        </div>
        <form action ="products.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p><b>Categories</b></p>
                    <div class="form-check">
                        <input class="form-check-input" value="Clothing" type="radio" name="categories" id="category_one"
                            onclick="uncheck('category_one')">
                        <label class="form-check-label" for="category_one">
                            Clothing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Shoes" type="radio" name="categories" id="category_two"
                            onclick="uncheck('category_two')">
                        <label class="form-check-label" for="category_two">
                            Shoes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Accessories" type="radio" name="categories" id="category_three"
                            onclick="uncheck('category_three')">
                        <label class="form-check-label" for="category_three">
                            Accessories
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="filter-btn" name="filterbtn" value="Filter" />
            </div>
        </form>
    </section> 


    <!-- Products Section. a php while loopis used for less repetition, and makes it easier if admin adds a product so they dont have to hardcode it in, rather get info
    from the database directly-->
    <section id="product-page" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <div class="col text-center">
            <h2><b>Products</b></h2>
            <hr class="mx-auto">
            <p><b>This Is The Page For Our Sports Products</b></p>
        </div>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?> <!-- loop through the result -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3 product-image" src="assets/<?php echo $row['product_image1']; ?>" />  <!-- display the product image -->
                    <div class="star-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5> <!-- display the product name -->
                    <h4 class="p-price">£<?php echo $row['product_price']; ?></h4> <!-- display the product price -->
                    <a class="btn buy-btn" href="one_product.php?product_id=<?php echo $row['product_id']; ?>">Buy Here</a> <!-- go to the product page -->
                </div>
            <?php } ?>
        </div>
        <nav aria-label="Products navigation">
        <!-- Page Pagination. Used for easily creating pages to display more products. would get repetitive making lots of html files with a list of products -->
    <ul class="pagination mt-5">
        <li class="page-item <?= $page_number <= 1 ? 'disabled' : '' ?>"> <!-- disable the previous button if the page number is less than or equal to 1 -->
            <a class="page-link" href="<?= $page_number > 1 ? "?page_number=" . ($page_number - 1) : '#' ?>">Previous</a> <!-- go to the previous page -->
        </li>
        <?php for ($i = 1; $i <= $total_no_of_pages; $i++) : ?> <!-- loop through the total number of pages -->
            <li class="page-item <?= $i == $page_number ? 'active' : '' ?>"> 
                <a class="page-link" href="?page_number=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?> <!-- end the loop -->
        <li class="page-item <?= $page_number >= $total_no_of_pages ? 'disabled' : '' ?>"> <!-- disable the next button if the page number is greater than or equal to the total number of pages -->
            <a class="page-link" href="<?= $page_number < $total_no_of_pages ? "?page_number=" . ($page_number + 1) : '#' ?>">Next</a> <!-- go to the next page -->
        </li>
    </ul>
</nav>

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
    <!-- JavaScript is used here, so that the images under the one_product page can be pressed and will become larger, with the older one getting minimised -->
    <!-- This is easier displayed in the first product "New Balance 550" which, purposely, has different product pictures to make this clearer -->
    <script>
        var allRadios = document.getElementsByName('categories'); // get all the radio buttons
        var booRadio; 
        var x = 0;
        for (x = 0; x < allRadios.length; x++) { // loop through the radio buttons
            allRadios[x].onclick = function () { // when a radio button is clicked
                if (booRadio == this) { 
                    this.checked = false; 
                    booRadio = null;
                } else {
                    booRadio = this;
                }
            };
        }
    </script>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>