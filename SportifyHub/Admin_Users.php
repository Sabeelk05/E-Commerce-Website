<?php
session_start();
include('server/config.php'); 

if(isset($_GET['page_number']) && $_GET['page_number'] != ""){ // Check if the page number is set
    $page_number = $_GET['page_number']; // Get the page number
}else{ 
    $page_number = 1; // If the page number is not set, set it to 1
}

// Prepare the statement to count total users
$stmt = $connection->prepare("SELECT COUNT(*) AS total_users FROM users"); // Count the total number of users
$stmt->execute();
$stmt->bind_result($total_users); // Bind the result directly to the $total_users variable
$stmt->fetch();
$stmt->close(); // Close the statement

$total_users_per_page = 6; // Set the number of users per page
$offset = ($page_number - 1) * $total_users_per_page; 
$previous_page = $page_number - 1; 
$next_page = $page_number + 1;
$total_no_of_pages = ceil($total_users / $total_users_per_page);

// Prepare the statement to fetch users with limit and offset
$stmt1 = $connection->prepare("SELECT * FROM users ORDER BY user_id ASC LIMIT ?, ?"); // Select all users 
$stmt1->bind_param("ii", $offset, $total_users_per_page); 
$stmt1->execute();
$product_result = $stmt1->get_result();
?>

<!-- HTML and rest of your PHP script -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managing Users!</title>
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
        <main class ="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Users</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>
            <h2 class="left-align">Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = $product_result->fetch_assoc()){ // Fetch the users
                            $user_name = $row['user_name']; // Get the user name
                            $user_email = $row['user_email']; // Get the user email
                            $user_id = $row['user_id']; // Get the user id
                        ?>
                        <tr>
                            <td><?php echo $user_name; ?></td> <!-- Display the user name -->
                            <td style="text-align: right;"><?php echo $user_email; ?></td> <!-- Display the user email -->
                            <td><a class="btn btn-danger" href ="Admin_Delete_User.php?user_id=<?php echo $user_id; ?>">Delete</a></td> <!-- Delete the user -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation example" class = "mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if($page_number <= 1){ echo "class='disabled'"; } ?>"> <!-- Disable the previous button if the page number is less than or equal to 1 -->
                            <a class="page-link" href="<?php if($page_number <= 1){ echo "#"; } else { echo "?page_number=".($page_number-1); } ?>"> <!-- Go to the previous page -->
                            Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?page_number=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="?page_number=2">2</a></li>
                        <?php if($page_number >= 3) { ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="?page_number=".$page_number; ?>"><?php echo $page_number; ?></a></li> <!-- Display the current page number -->
                        <?php } ?>
                        <li class="page-item <?php if($page_number >= $total_no_of_pages){ echo "class='disabled'"; } ?>"> <!-- Disable the next button if the page number is greater than or equal to the total number of pages -->
                            <a class="page-link" href="<?php if($page_number >= $total_no_of_pages){ echo "#"; } else { echo "?page_number=".($page_number+1); } ?>"> <!-- Go to the next page -->
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