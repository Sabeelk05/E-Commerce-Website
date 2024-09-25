<?php
    include('config.php'); /* including the config.php file */
    $bsstmt = $connection->prepare("SELECT * FROM products LIMIT 4"); /* selecting all the products from the cwproducts table */

    $bsstmt->execute(); /* executing the statement */
    $bsresult = $bsstmt->get_result(); /* getting the result */

?>