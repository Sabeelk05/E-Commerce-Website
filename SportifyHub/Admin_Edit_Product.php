<?php
session_start();
include('server/config.php');

if(isset($_GET['product_id'])){ // Check if the product_id is set 
    $product_id = $_GET['product_id']; // Get the product_id
    $stmt1 = $connection->prepare("SELECT * FROM products WHERE product_id = ?"); // Select the product with the product_id
    $stmt1->bind_param("i", $product_id); 
    $stmt1->execute();
    $product_result = $stmt1->get_result();
    $product = $product_result->fetch_assoc();
} else if(isset($_POST['edit'])){ // Check if the edit button is clicked
    $product_id = $_POST['product_id']; // Get the product_id
    $product_name = $_POST['productname']; // Get the product name
    $product_price = $_POST['productprice']; // Get the product price
    $product_description = $_POST['productdescription']; // Get the product description
    $new_product_image = $_POST['productimage']; // Get the product image
    $product_category = $_POST['category']; // Get the product category

    // Fetch current product details
    $stmt2 = $connection->prepare("SELECT product_image1 FROM products WHERE product_id = ?"); 
    $stmt2->bind_param("i", $product_id); 
    $stmt2->execute();
    $result = $stmt2->get_result();
    $current_product = $result->fetch_assoc(); // Fetch the current product details
    $current_image = $current_product['product_image1']; // Get the current product image

    $product_image = (!empty($new_product_image)) ? $new_product_image : $current_image; // If the new product image is not empty, set it to the new product image, otherwise set it to the current product image

    $stmt = $connection->prepare("UPDATE products SET product_name = ?, product_price = ?, product_description = ?, product_image1 = ?, product_category = ? WHERE product_id = ?"); // Update the product details
    $stmt->bind_param("sssssi", $product_name, $product_price, $product_description, $product_image, $product_category, $product_id); // Bind the parameters
    if($stmt->execute()){
        header("Location: Admin_Products.php?success= Your Edits Have Been Saved!"); // If the query is successful, redirect the user to the Admin_Products page
    } else {
        header("Location: Admin_Products.php?error= An error occurred: Your edits could not be saved :(");
    }
} else {
    header("Location: Admin_Products.php");
    exit();
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Products!</title>
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
                        <a class="nav-link" href="Add_Products.php">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Admin_Products.php">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Admin_Users.php"> Users </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Admin_Logout.php?logout=1"> Sign Out </a>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row" style="min-height: 1000px">
            <div class="col-lg-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Editing Product</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                        </div>
                    </div>
                </div>
                <h2 class="left-align-edit">Editing Product</h2>
                <div class="table-responsive">
                    <div class="mx-auto container">
                        <form id="edit-form" method="POST" action="Admin_Edit_Product.php">
                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?></p>
                            <div class="form-group mt-2">
                                <?php foreach ($product_result as $product_result) { ?>
                                    <input name="product_id" type="hidden" value="<?php echo $product_result['product_id'] ?>"> <!-- Hidden input field to store the product_id -->
                                <label for="productname">Product Name</label>
                                <input type="text" class="form-control" id="productname" value="<?php echo $product_result['product_name'] ?>" name="productname" 
                                    placeholder="Enter Product Name"> <!-- Input field to edit the product name -->
                            </div>
                            <div class="form-group mt-2">
                                <label for="productprice">Product Price</label>
                                <input type="text" class="form-control" id="productprice" value="<?php echo $product_result['product_price'] ?>" name="productprice"
                                    placeholder="Enter Product Price"> <!-- Input field to edit the product price -->
                            </div>
                            <div class="form-group mt-2">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control" id="productdescription" value="<?php echo $product_result['product_description'] ?>" name="productdescription"
                                    placeholder="Enter Product Description"> <!-- Input field to edit the product description -->
                            </div>
                            <div class="form-group mt-2">
                                <label for="productimage">Product Image</label>
                                <input type="file" class="form-control" id="productimage" value="<?php echo $product_result['product_image1'] ?>" name="productimage"
                                    placeholder="Enter Product Image"> <!-- Input field to edit the product image -->
                            </div> 
                            <div class="form-group mt-2">
                                <label for="productcategory">Product Category</label> <!-- Input field to edit the product category -->
                                <select class="form-select" required name="category">
                                    <option value="Clothing">Clothes</option>
                                    <option value="Shoes">Shoes</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" class="btn" id="edit-btn" name="edit" value="Edit Product" />
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

















    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>