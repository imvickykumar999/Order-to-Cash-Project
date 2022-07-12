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
$quantity = $row['Quantity'];
$total = $quantity*$price;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

  </style>
  <body>
  <div class="row">
  <div class="col-75">
    <div class="container">
    <form action="" name="checkoutform" id="checkoutform" method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col-50">
            <h3>Personal Details</h3>
            <?php echo "<input type='hidden' id='price' name='price' value=".$total.">"?>
            <?php echo "<input type='hidden' id='quantity' name='quantity' value=".$quantity.">"?>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="Enter Your Fullname">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Enter Your Email">
            <h3>Shipping Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="House no/Street no./Area">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Enter Your City">
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Zipcode">
              </div>
            </div>
            <h3>Billing Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="b_adr" name="b_address" placeholder="House no/Street no./Area">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="b_city" name="b_city" placeholder="Enter Your City">
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="b_state" name="b_state" placeholder="State">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="b_zip" name="b_zip" placeholder="Zipcode">
              </div>
              
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Enter The Card Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Date</label>
            <input type="text" id="expdate" name="expdate" placeholder="MM/YY">

            <div class="row">
              <!-- <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div> -->
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
            <div>
                <label for="cvv">Voucher Code</label>
                <input type="text" id="voucher" name="voucher" placeholder="COUPON">
              </div>
              <div>
                <label for="cvv">Discount</label>
                <input type="text" id="discount" name="discount" placeholder="DISCOUNT10">
              </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="Button" id="checkout" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>4</b>
        </span>
      </h4>
      <p><a href="#">Product 1</a> <span class="price"><?php echo $price;?></span></p>
      <p><a href="#">Quantity</a> <span class="quantity"><?php echo $quantity;?></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $total;?></b></span></p>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="creditCardValidator.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="jqscript.js"></script>
  </body>
</html>