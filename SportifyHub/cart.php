

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart!</title>
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


    <!-- Cart Using Table-->
    <section class="cart container text-center my-5  py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Shopping Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Products</th>
                <th>Quantity</th>
                <th>Price </th>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/DHat.png" />
                        <div>
                            <p>New Balance 550</p>
                            <small><span>£</span>110</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>£</span>
                    <span class="product-price">110</span>
                </td>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/NewBalanceShoes.png" />
                        <div>
                            <p>New Balance 550</p>
                            <small><span>£</span>110</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>£</span>
                    <span class="product-price">110</span>
                </td>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/SkiGlasses.png" />
                        <div>
                            <p>New Balance 550</p>
                            <small><span>£</span>110</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>£</span>
                    <span class="product-price">110</span>
                </td>
            </tr>
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>£330</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>£330</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <a class="btn checkout-btn" href="checkout.html">CHECKOUT</a>
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