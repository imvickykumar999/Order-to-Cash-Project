<?php
session_start();
$servername = "localhost";
$username = "root";
$Password = "";
$database = "order_to_cash";


// Create a connection
$conn = mysqli_connect($servername, $username, $Password,$database);

// Die if connection was not successful
if (!$conn){
die("Sorry we failed to connect: ". mysqli_connect_error());
}
// else{
//     echo "connection succesfull";
// }
?>