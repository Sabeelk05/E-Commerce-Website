<?php

include('server/config.php');
if(isset($_POST['create_prod'])) { // Check if the create_prod button is clicked
    $productname = $_POST['productname']; // Get the product name
    $productprice = $_POST['productprice']; // Get the product price
    $productdescription = $_POST['productdescription']; // Get the product description
    $category = $_POST['category']; // Get the product category
    $productimage1 = $_FILES['productimage1']['tmp_name']; // Get the first product image
    $productimage2 = $_FILES['productimage2']['tmp_name']; 
    $productimage3 = $_FILES['productimage3']['tmp_name']; 
    $productimage4 = $_FILES['productimage4']['tmp_name']; 

    //img name
    $image_name1= $productname."1.png"; // Set the first image name
    $image_name2= $productname."2.png"; 
    $image_name3= $productname."3.png"; 
    $image_name4= $productname."4.png"; 

    move_uploaded_file($productimage1, "assets/$image_name1"); // Move the first image to the assets folder
    move_uploaded_file($productimage2, "assets/$image_name2");
    move_uploaded_file($productimage3, "assets/$image_name3");
    move_uploaded_file($productimage4, "assets/$image_name4");

    $stmt = $connection->prepare("INSERT INTO products (product_name, product_price, product_description, product_category, product_image1, product_image2, product_image3, product_image4) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); // Insert the product details into the products table
    $stmt->bind_param("ssssssss", $productname, $productprice, $productdescription, $category, $image_name1, $image_name2, $image_name3, $image_name4); // Bind the parameters

    if($stmt->execute()){
        header("location: Admin_Products.php"); // Redirect to the products page
        exit(); 
    }else{
        header("location: Admin_Create_Product.php?error=Failed to create product");
        exit();
    }
}
?>