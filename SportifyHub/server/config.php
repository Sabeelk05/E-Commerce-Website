<?php

$connection = mysqli_connect("localhost","root","","cwdatabase"); /* servername, username, password, database name */

if (!$connection) { /* if the connection is not successful, it will display an error message */
    die("Could not connect to the server: " . mysqli_connect_error()); /* error message */  
}

?> 