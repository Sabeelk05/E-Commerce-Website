<?php
session_start();
include('server/config.php');
if(isset($_GET['page_number']) && $_GET['page_number']!=""){  // Check if the page number is set
    $page_number = $_GET['page_number'];
}else{
    $page_number = 1;
}

$stmt = $connection->prepare("SELECT COUNT(*) As total_products FROM products"); // Count the total number of products
$stmt->execute();
$stmt->bind_result($total_products);
$stmt->store_result();
$stmt->fetch();

$total_products_per_page = 6;
$offset = ($page_number-1) * $total_products_per_page;
$previous_page = $page_number - 1;
$next_page = $page_number + 1;
$adjacents = "2";
$total_no_of_pages = ceil($total_products / $total_products_per_page); // Calculate the total number of pages

$stmt1 = $connection->prepare("SELECT * FROM products LIMIT $offset, $total_products_per_page"); // Select all products
$stmt1->execute(); 
$product_result = $stmt1->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing Products!</title>
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

    <div class="container-fluid">
        <div class="row" style="min-height: 1000px">
        <main class ="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>
            <h2 class="left-align">Products</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = $product_result->fetch_assoc()){ // Fetch the products
                            $product_id = $row['product_id']; // Get the product id
                            $product_name = $row['product_name']; // Get the product name
                            $product_price = $row['product_price']; // Get the product price
                            $product_image = $row['product_image1']; // Get the product image
                            $product_description = $row['product_description']; // Get the product description
                            $product_category = $row['product_category']; // Get the product category
                        ?>
                        <tr>
                            <td><?php echo $product_id; ?></td> <!-- Display the product id -->
                            <td><?php echo $product_name; ?></td> <!-- Display the product name -->
                            <td><?php echo "£".$product_price; ?></td> <!-- Display the product price -->
                            <td><img src="assets/<?php echo $product_image; ?>" width="100" height="100" /></td> <!-- Display the product image -->
                            <td><?php echo $product_description; ?></td> <!-- Display the product description -->
                            <td><?php echo $product_category; ?></td> <!-- Display the product category -->
                            <td><a class="btn btn-primary" href="Admin_Edit_Product.php?product_id=<?php echo $product_id; ?>">Edit</a></td> <!-- Edit the product -->
                            <td><a class="btn btn-danger" href ="Admin_Delete_Product.php?product_id=<?php echo $product_id; ?>">Delete</a></td> <!-- Delete the product -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <style>
                
            </style>

                <nav aria-label="Page navigation example" class = "mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if($page_number <= 1){ echo "class='disabled'"; } ?>"> 
                            <a class="page-link" href="<?php if($page_number <= 1){ echo "#"; } else { echo "?page_number=".($page_number-1); } ?>">
                            Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?page_number=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="?page_number=2">2</a></li>
                        <?php if($page_number >= 3) { ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="?page_number=".$page_number; ?>"><?php echo $page_number; ?></a></li>
                        <?php } ?>
                        <li class="page-item <?php if($page_number >= $total_no_of_pages){ echo "class='disabled'"; } ?>">
                            <a class="page-link" href="<?php if($page_number >= $total_no_of_pages){ echo "#"; } else { echo "?page_number=".($page_number+1); } ?>">
                            Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>










    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>