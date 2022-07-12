<?php include "db_connect.php";
//session_start();
$_SESSION['Customer_id'];
   $ID=$_SESSION['Customer_id'];
    $logouttime = date("Y-m-d H:i:s");
    echo $update= "UPDATE `Customer_log` SET `Logout_time` = '$logouttime' WHERE `Customer_id` = $ID";
    $update_result=mysqli_query($conn, $update);
session_destroy();
$cookie_name='user';
$cookie_value= $ID;
setcookie($cookie_name, $cookie_value, time()-(1*60*60),'/');
header('location:index.php');

?>