<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Products!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-2 fixed-top">
        <div class="container-fluid">
            <img src="assets/WebsiteLogo.png" width="130" height="40" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Add_Products.php">Add products</a>
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

<!-- Form that is used for input field for the Admin -->

    <div class="table-responsive" style="margin-top: 150px;">
                    <div class="mx-auto container">
                        <form id="create-form" enctype="multipart/form-data" method="POST" action="Admin_Create_Product.php">
                            <p style="color: red;"><?php if (isset($_GET['error'])) { 
                                echo $_GET['error'];
                            } ?></p>
                            <div class="form-group mt-2">
                                <label for="productname">Product Name</label>
                                <input type="text" class="form-control" id="productname" name="productname" placeholder="Enter Product Name" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productprice">Product Price</label>
                                <input type="text" class="form-control" id="productprice" name="productprice"
                                    placeholder="Enter Product Price" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control" id="productdescription" name="productdescription"
                                    placeholder="Enter Product Description" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productimage">Product Image 1</label>
                                <input type="file" class="form-control" id="productimage1" name="productimage1"
                                    placeholder="Enter Product Image" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productimage">Product Image 2</label>
                                <input type="file" class="form-control" id="productimage2" name="productimage2"
                                    placeholder="Enter Product Image" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productimage">Product Image 3</label>
                                <input type="file" class="form-control" id="productimage3" name="productimage3"
                                    placeholder="Enter Product Image" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productimage">Product Image 4</label>
                                <input type="file" class="form-control" id="productimage4" name="productimage4"
                                    placeholder="Enter Product Image" required/>
                            </div>
                            <div class="form-group mt-2">
                                <label for="productcategory">Product Category</label>
                                <select class="form-select" required name="category">
                                    <option value="Clothing">Clothes</option>
                                    <option value="Shoes">Shoes</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" class="btn" id="edit-btn" name="create_prod" value="Create Product" required/>
                            </div>
                        </form>
                    </div>
                </div>