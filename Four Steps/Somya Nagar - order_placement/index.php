<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Here</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  </head>
  <style>
    #customBtn {
      display: inline-flex;
      background: white;
      color: #444;
      width: 125px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    .g-signin2{
      display: inline;
    }
    .container {
  margin: 50px auto;
  width: 640px;
}
 
.login {
  position: relative;
  margin: auto;
  padding: 20px 20px 20px;
  width: 310px;
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
    
  </style>

<body>
  <div class="container">
    <div class="login">
        <div class="form">
            <h1>LOGIN FORM</h1>
            <br>
            <form action="" name="loginform" id="loginform" method="post" enctype="multipart/form-data">
        
            <label for="email"class="form-label"><b>Email Id:</b> </label>
            <input type="t"  class="form-control"placeholder="Enter Email" id="email" name="email"><span id="ename" class="formerror"></span><br>
            <label for="password"class="form-label"><b>Password:</b></label>
            <input type="password" class="form-control"placeholder="Enter Password" id="password" name="password"<?php if(isset($_COOKIE["ID"])) { echo $row['Password']; } ?>><span id="pass"
                class="formerror"></span> <i class="far fa-eye" id="togglePassword" onclick="myFunction()"></i><br>
                <input type="checkbox" id="check1" name="remember"<?php if(isset($_COOKIE["ID"])) { ?> checked <?php }?>>Remember me<span id="checkbox1" class="formerror"></span><br>
            <br>
                <input type="button" class="btn btn-primary"value="login" name="login" id="login">
            <br>
</body>
</html>
        <hr>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
        
  <script>
    function myFunction() {
    var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jqscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>