<?php

// Create connection
$con = mysqli_connect("localhost","root","","almanoua");
//echo'yes';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

 ?>