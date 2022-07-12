<?php include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Here</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
  <style>
      .container {
  margin: 50px auto;
  width: 1000px;
}
 
.login {
  position: relative;
  margin: auto;
  margin-top:20px;
  height:auto;
  padding: 20px 20px 20px;
  width: 450px;
  background: gainsboro
}
:-moz-placeholder {
  color: #c9c9c9 !important;
  font-size: 13px;
}
 
::-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}
.login:before {
  content: '';
  position: absolute;
  top: -8px;
  right: -8px;
  bottom: -8px;
  left: -8px;
  z-index: -1;
  background: rgba(0, 0, 0, 0.08);
  border-radius: 4px;
}
 
.login h1 {
  margin: -20px -20px 21px;
  line-height: 40px;
  font-size: 15px;
  font-weight: bold;
  color: #555;
  text-align: center;
  text-shadow: 0 1px white;
  background: #f3f3f3;
  border-bottom: 1px solid #cfcfcf;
  border-radius: 3px 3px 0 0;
  background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
  background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
  -webkit-box-shadow: 0 1px whitesmoke;
  box-shadow: 0 1px whitesmoke;
}
body {
  font: 13px/20px &quot;Lucida Grande&quot;, Tahoma, Verdana, sans-serif;
  color: #404040;
  background: #0ca3d2;
}
    /* div.form {
      display: block;
      margin-top: 200px;
      text-align: center;
      
    } */

    form {
      display: inline-block;
      margin-left: auto;
      margin-right: auto;
      text-align: left;
    }

    span {
      color: red;
    }
    div.php{
      display: block;
      margin-left: 400px;
    }
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 125px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
  </style>
  <body>
  <div class="container">
    <div class="login">
        <div class="form">
            <h1>REGISTRATION FORM</h1>
            <br>
            <form action="" name="myform" id="myform" method="post" enctype="multipart/form-data">
            <div class="col-xs-2">
            <label for="fname" class="form-label"><b>Fullname:</b></label>
            <input type="text" class="form-control" placeholder="Enter Firstname" id="fname" name="fname" autofocus style="width: 400px;"><span id="username"class="formerror"></span>
            </div>
            <label for="email" class="form-label"><b>Email Id:</b> </label>
            <input type="t" class="form-control"placeholder="Enter Email" id="email" name="email"style="width: 400px;"><span id="ename" class="formerror"></span>
            <label for="password" class="form-label"><b>Password:</b></label>
            <input type="password"  class="form-control"placeholder="Enter Password" data-toggle="tooltip"id="password" name="password"style="width: 400px;">
            <span id="pass"class="formerror"></span>
            <p >Password rules-
            <ul>
                <li>Must contain lowercase letters</li>
                <li>Must contain Uppercase letters</li>
                <li>Must contain atleast one Numeric digit</li>
                <li>Must contain atleast one Special character</li>
            </ul>
            </p>
            <label for="cpassword" class="form-label"><b>Confirm Password:</b></label>
            <input type="password" class="form-control"placeholder="Enter Confirm Password" id="cpassword" name="password"style="width: 400px;"><span id="cpass"
                class="formerror"></span>
            <label for="Mobile" class="form-label"><b>Mobile No.:</b></label>
            <input type="text"class="form-control" placeholder="Enter Mobile No." id="Mobile" name="Mobile"style="width: 400px;"><span id="mono"
                class="formerror"></span>
        <br>
            <input type="button" class="btn btn-primary" value="Submit" name="submit" id="submit">
            <br>
            Already have an account? <a href="index.php">login here</a>
  </body>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jqscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>