
<?php include "db_connect.php";
if((!isset($_SESSION['Customer_id']) || ($_SESSION['Customer_id'] == "")) && (!isset($_COOKIE['user'])))
{
  header('location: index.php');
}
if(isset($_COOKIE['user'])){
  $_SESSION['Customer_id'] = $_COOKIE['user'];
}
$customer_id = $_SESSION['Customer_id'];
$sql = "SELECT * FROM `order_placement` WHERE `Customer_id`= $customer_id ORDER BY `Customer_id` DESC";
$sql_result= mysqli_query($conn, $sql);
//$user_arr = array();
$result = mysqli_num_rows($sql_result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <style>
    table, th, td {
        border: 1px solid black;
      }
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="product.php">Products</a>
        </li>
      </ul>
      <form class="d-flex">
      <li class="nav-item">
        <img src="profile.jpg" alt=""style="width: 50px; border-radius: 50%;">
        <h5 style="color: white;display: inline;"><?php 
        $sql_s = "SELECT * FROM `order_placement` WHERE `Customer_id`= $customer_id ORDER BY `Customer_id` DESC";
        $sql_r= mysqli_query($conn, $sql_s);
        //$user_arr = array();
        $result = mysqli_num_rows($sql_r);
        $drow = $sql_r->fetch_assoc();
        $fullname = $drow['Fullname'];
        echo $fullname; ?></h3>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
        </li>
      </form>
    </div>
  </div>
</nav>
    <div class="container" style="margin: 50px">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Order By
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <form action="" method="post" id="filterdateform">
                <li><a class="dropdown-item" href="javascript:void(0);" onclick ="filterbydate()">Day</a></li>
           </form>
           <form action="" method="post" id="filterweekform">
                <li><a class="dropdown-item" href="javascript:void(0);"onclick ="filterbyweek()">Week</a></li>
          </form>
          <form action="" method="post" id="filtermonthform">
                <li><a class="dropdown-item" href="javascript:void(0);"onclick ="filterbymonth()">Month</a></li>
          </form>
          <form action="" method="post" id="filteryearform">
                <li><a class="dropdown-item" href="javascript:void(0);"onclick ="filterbyyear()">Year</a></li>
          </form>
            </ul>
        </div>
        <br>
        <h3 style="margin-left: 500px;margin-bottom: 40px;">Order Details</h3>
        <table id="data_table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Shipping Address</th>
                <th>Billing Address</th>
                <th>Cardname</th>
                <th>Card number</th>
                <th>Exp Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php if($result){
                    while ($row = $sql_result->fetch_assoc()) {
                            $date =   $row["Date"];
            ?>
                <th><?php echo  $row['Order_id'];?></th>
                <th><?php echo  $row['Fullname'];?></th>
                <th><?php echo  $row['Email'];?></th>
                <th><?php echo  $row['Shipping_address'];?></th>
                <th><?php echo  $row['Billing_address'];?></th>
                <th><?php echo  $row['Card_name'];?></th>
                <th><?php echo  $row['Card_no'];?></th>
                <th><?php echo  $row['Exp_date'];?></th>
                <th><?php echo  $row['Quantity'];?></th>
                <th><?php echo  $row['Price'];?></th>
                <th><?php echo  $row['Status'];?></th>
                <th><?php echo   date("d,M Y h:i:s A",strtotime($date));?></th>
            </tr>
            <?php 
            }
              }
            ?>
        </tbody>
    </table>
   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="jqscript.js"></script>
  </body>
</html>