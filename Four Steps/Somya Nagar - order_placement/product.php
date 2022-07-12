<?php include "db_connect.php";
if((!isset($_SESSION['Customer_id']) || ($_SESSION['Customer_id'] == "")) && (!isset($_COOKIE['user'])))
{
  header('location: index.php');
}
if(isset($_COOKIE['user'])){
  $_SESSION['Customer_id'] = $_COOKIE['user'];
}
$sql = "SELECT * FROM Products";
$sql_result= mysqli_query($conn, $sql);
$result = mysqli_num_rows($sql_result);
$row = $sql_result->fetch_assoc();
$price = $row['Price'];
$customer_id = $_SESSION['Customer_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Placement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .counter {
    width: 150px;
    display: flex;
    margin-bottom: 10px;
    /* align-items: center; */
    justify-content: center;
}
.counter input {
    width: 50px;
    border: 0;
    line-height: 30px;
    font-size: 20px;
    text-align: center;
    background: #0052cc;
    color: #fff;
    appearance: none;
    outline: 0;
}
.counter span {
    display: block;
    font-size: 25px;
    padding: 0 10px;
    cursor: pointer;
    color: #0052cc;
    user-select: none;
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
    <div>

        <div class="container h-100" style="width:1000px;height:500px">
        <h1 style="text-align: center;">Place Your Order</h1>
        <br>
            <div class="row align-items-center h-100">
                    <div class="col-6 mx-auto"style="width: 400px;height:520pxpx;">
                        <div class="card h-100 border-primary justify-content-center">
                            <div>
                                <img src="tshirt.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                <form action="" name="myform" id="myform" method="post" enctype="multipart/form-data">
                                    <h5 class="card-title">Men's Regular Tshirt</h5>
                                    <h6 class="price">Price - <?php echo $price;?></h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <h6>Quantity-</h6>
                                    <div class="counter">
                                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                        <input type="text" name="quantity"value="1">
                                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                                    </div>
                                    <h6> Available Voucher - ABCDEF</h6>
                                    <h6> Available Discount - DISCOUNT10</h6>
                                    <?php echo "<a href='Place_order.php' class='btn btn-success'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Place Order</a>"?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
	<script src="jqscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="jqscript.js"></script>
    <script>
        function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
        }

        function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
        }
}
    </script>
  </body>
</html>