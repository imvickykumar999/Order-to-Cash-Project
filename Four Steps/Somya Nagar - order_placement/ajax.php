<?php include "db_connect.php";
//error_reporting(0);
if(isset($_POST['action']) && $_POST['action']=='submit_reg_form'){
    //extract($_POST);
    $fname =$conn -> real_escape_string($_POST['fname']);
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $Mobile = $_POST['Mobile'];

    $email_check="SELECT * FROM `Customer_details` WHERE `Email`='$email';";
    $email_result= mysqli_query($conn, $email_check);

    if(mysqli_num_rows($email_result) > 0){
        echo "duplicate";
      }
    else{
        $sql = "INSERT INTO `Customer_details` (`Fullname`, `Email`, `Password`, `Mobileno`) VALUES ( '$fname', '$email', '$password', '$Mobile');";
        if(mysqli_query($conn, $sql)){
            echo "inserted";
        }
        else{
            echo "error in insertion";
        }  
    }
}
if(isset($_POST['action']) && $_POST['action']=='login_data'){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    //$id=$_POST['ID'];
    $login="SELECT * FROM `Customer_details` WHERE `Email`='$email' and `Password`='$password'";
    $login_result= mysqli_query($conn, $login);
    $result= mysqli_num_rows($login_result);
    if($result>0){
      // $last_id = $conn->insert_id;
       $row = $login_result->fetch_assoc();
           $ID=$row['Customer_id'];
           $_SESSION['Customer_id']=$ID;
           $_SESSION['email'] = $email;
           $userIP = $_SERVER['REMOTE_ADDR'];                                        
           $logintime = date("Y-m-d H:i:s");
           $insert= "INSERT INTO `Customer_log` (`Login_time`,`IP_address`, `Customer_ID`) VALUES ('$logintime','$userIP', $ID)";
           $insert_result=mysqli_query($conn, $insert);
           if(isset($_POST['remember'])){
               $remember = $_POST['remember'];
               $cookie_name='user';
               $cookie_value=$row['Customer_id'];
               setcookie($cookie_name, $cookie_value, time()+(1*60*60),'/');
           } 
           echo "success";
      
       //print_r($_SESSION['email'] )
    }
    else{
        echo "error";
    }
}
if(isset($_POST['action']) && $_POST['action']=='checkout_data'){
    //extract($_POST);
    $customer_id = $_SESSION['Customer_id'];
    $price =  $_POST['price'];
    $quantity =  $_POST['quantity'];
    $fname =$conn -> real_escape_string($_POST['fname']);
    $email = $_POST['email'];
    $shipp_add = $_POST['address'];
    $s_city = $_POST['city'];
    $s_state = $_POST['state'];
    $s_zip = $_POST['zip'];
    $bill_add = $_POST['b_address'];
    $b_city = $_POST['b_city'];
    $b_state = $_POST['b_state'];
    $b_zip = $_POST['b_zip'];
    $cardname = $_POST['cardname'];
    $cardnum = $_POST['cardnumber'];
    $expdate = $_POST['expdate'];
    $applied_voucher = $_POST['voucher'];
    $applied_discount = $_POST['discount'];
    $cvv= $_POST['cvv'];
        $order_check = "SELECT * FROM `products`";
        $order_result = mysqli_query($conn, $order_check);
        $row = $order_result->fetch_assoc();
        if(mysqli_num_rows($order_result)>0){
            $region_of_delivery = $row['Region_of_delivery'];
            $voucher = $row['Voucher'];
            $discount = $row['Discount'];
            if($region_of_delivery !== $s_state){
                echo "Order is not deliverable at this location";
            }
            elseif($voucher !== $applied_voucher ){
                echo "Applied Voucher is not valid";
            }
            elseif($applied_discount !== $discount){
                echo "Applied discount is not valid on this order";
            }
            else{
                $sql = "INSERT INTO `order_placement` (`Customer_id`,`Fullname`, `Email`, `Shipping_address`, `Billing_address`,`Card_name`,`Card_no`,`Exp_date`,`Cvv`,`Quantity`,`Price`,`Status`) VALUES ('$customer_id', '$fname', '$email', '$shipp_add $s_city $s_state $s_zip', '$bill_add $b_city $b_state $b_zip','$cardname', '$cardnum', '$expdate','$cvv',' $quantity','$price','Placed')";
                if(mysqli_query($conn, $sql)){
                    echo "inserted";
                    function email($conn,$email,$fname,$message){
                        $to = $email;
                        $subject = "shop here";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers.="FROM: shophere@gmail.com";
                       
                        mail($to, $subject, $message, $headers);
                        return true;
                        //header("location:dashboard.php");
                        }
                    $message="<html lang='en'>
                    <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                    <title>HTML 5 Boilerplate</title>
                    <link rel='stylesheet' href='style.css'>
                    </head>
                    <body>
                    <p><b> Hello $fname,</b><p>
                    <br>
                    <p>Your order has been successfully placed</p>
                    <br>
                    Kind Regards, Shophere</p>
                    <p>if you have any queries reach out to us at Shophere.com</p>
                    </body>
                    </html>
                    ";
                    email($conn,$email,$fname, $message);
                }
                else{
                    echo "error in insertion";
                }  
            
            }
        }
}

if(isset($_POST['action']) && $_POST['action']=='filterdate_data'){
    //extract($_POST);
    $customer_id = $_SESSION['Customer_id'];
    // SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());
    // SELECT * FROM order_placement WHERE Date BETWEEN '2016/01/01' AND '2016/12/31';
        $sql = "SELECT * FROM order_placement";
        $sql_result= mysqli_query($conn, $sql);
          //$user_arr = array();
          $result = mysqli_num_rows($sql_result);
          $row = $sql_result->fetch_assoc(); 
          $response = "";
          $fname = $row['Fullname'];
                  if($result){
                    while ($row = $sql_result->fetch_assoc()) {
                       $date =   $row["Date"];
                       $sql_date = "SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());";
                        $sqldate_result= mysqli_query($conn, $sql_date);
                        //$user_arr = array();
                        $result_num_rows = mysqli_num_rows($sqldate_result);
                        $drow = $sqldate_result->fetch_assoc();

                        $response .= '<tr><td>'.$drow['Order_id'].'</td><td>'.$drow['Fullname'].'</td>
                        <td>'.$drow['Email'].'</td><td>'.$drow['Shipping_address'].'</td>
                        <td>'.$drow['Billing_address'].'</td>
                        <td>'.$drow['Card_name'].'</td><td>'.$drow['Card_no'].'</td><td>'.$drow['Exp_date'].'</td><td>'.$drow['Quantity'].'</td><td>'.$drow['Price'].'</td><td>'.$drow['Status'].'</td><td>'.$date.'</td>';
                       $response.= "<td></tr>
                       </tr>";
                       
          }
          echo $response;
                     
         
         
        }
       
                       
       
}
if(isset($_POST['action']) && $_POST['action']=='filterweek_data'){
    //extract($_POST);
    $customer_id = $_SESSION['Customer_id'];
    // SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());
    // SELECT * FROM order_placement WHERE Date BETWEEN '2016/01/01' AND '2016/12/31';
        $sql = "SELECT * FROM order_placement";
        $sql_result= mysqli_query($conn, $sql);
          //$user_arr = array();
          $result = mysqli_num_rows($sql_result);
          $row = $sql_result->fetch_assoc(); 
          $response = "";
          $fname = $row['Fullname'];
                  if($result){
                    while ($row = $sql_result->fetch_assoc()) {
                       $date =   $row["Date"];
                       $sql_date = "SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());";
                        $sqldate_result= mysqli_query($conn, $sql_date);
                        //$user_arr = array();
                        $result_num_rows = mysqli_num_rows($sqldate_result);
                        $drow = $sqldate_result->fetch_assoc();

                        $response .= '<tr><td>'.$drow['Order_id'].'</td><td>'.$drow['Fullname'].'</td>
                        <td>'.$drow['Email'].'</td><td>'.$drow['Shipping_address'].'</td>
                        <td>'.$drow['Billing_address'].'</td>
                        <td>'.$drow['Card_name'].'</td><td>'.$drow['Card_no'].'</td><td>'.$drow['Exp_date'].'</td><td>'.$drow['Quantity'].'</td><td>'.$drow['Price'].'</td><td>'.$drow['Status'].'</td><td>'.$date.'</td>';
                       $response.= "<td></tr>
                       </tr>";
                       
          }
          echo $response;
         
        }
       
}
if(isset($_POST['action']) && $_POST['action']=='filtermonth_data'){
    //extract($_POST);
    $customer_id = $_SESSION['Customer_id'];
    // SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());
    // SELECT * FROM order_placement WHERE Date BETWEEN '2016/01/01' AND '2016/12/31';
        $sql = "SELECT * FROM order_placement";
        $sql_result= mysqli_query($conn, $sql);
          //$user_arr = array();
          $result = mysqli_num_rows($sql_result);
          $row = $sql_result->fetch_assoc(); 
          $response = "";
          $fname = $row['Fullname'];
                  if($result){
                    while ($row = $sql_result->fetch_assoc()) {
                       $date =   $row["Date"];
                       $sql_date = "SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());";
                        $sqldate_result= mysqli_query($conn, $sql_date);
                        //$user_arr = array();
                        $result_num_rows = mysqli_num_rows($sqldate_result);
                        $drow = $sqldate_result->fetch_assoc();

                        $response .= '<tr><td>'.$drow['Order_id'].'</td><td>'.$drow['Fullname'].'</td>
                        <td>'.$drow['Email'].'</td><td>'.$drow['Shipping_address'].'</td>
                        <td>'.$drow['Billing_address'].'</td>
                        <td>'.$drow['Card_name'].'</td><td>'.$drow['Card_no'].'</td><td>'.$drow['Exp_date'].'</td><td>'.$drow['Quantity'].'</td><td>'.$drow['Price'].'</td><td>'.$drow['Status'].'</td><td>'.$date.'</td>';
                       $response.= "<td></tr>
                       </tr>";
                       
          }
          echo $response;
         
        }
       
}

if(isset($_POST['action']) && $_POST['action']=='filteryear_data'){
    //extract($_POST);
    $customer_id = $_SESSION['Customer_id'];
    // SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());
    // SELECT * FROM order_placement WHERE Date BETWEEN '2016/01/01' AND '2016/12/31';
        $sql = "SELECT * FROM order_placement";
        $sql_result= mysqli_query($conn, $sql);
          //$user_arr = array();
          $result = mysqli_num_rows($sql_result);
          $row = $sql_result->fetch_assoc(); 
          $response = "";
          $fname = $row['Fullname'];
                  if($result){
                    while ($row = $sql_result->fetch_assoc()) {
                       $date =   $row["Date"];
                       $sql_date = "SELECT * FROM `order_placement` WHERE year(Date)=year(CURRENT_DATE());";
                        $sqldate_result= mysqli_query($conn, $sql_date);
                        //$user_arr = array();
                        $result_num_rows = mysqli_num_rows($sqldate_result);
                        $drow = $sqldate_result->fetch_assoc();

                        $response .= '<tr><td>'.$drow['Order_id'].'</td><td>'.$drow['Fullname'].'</td>
                        <td>'.$drow['Email'].'</td><td>'.$drow['Shipping_address'].'</td>
                        <td>'.$drow['Billing_address'].'</td>
                        <td>'.$drow['Card_name'].'</td><td>'.$drow['Card_no'].'</td><td>'.$drow['Exp_date'].'</td><td>'.$drow['Quantity'].'</td><td>'.$drow['Price'].'</td><td>'.$drow['Status'].'</td><td>'.$date.'</td>';
                       $response.= "<td></tr>
                       </tr>";
                       
          }
          echo $response;
         
        }
       
}

?>

