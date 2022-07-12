$("#submit").click(function(){
    $("#username").hide();
    $("#ename").hide();
    $("#pass").hide();
    $("#cpass").hide();
    $("#mono").hide();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var pattern_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $("#email").val();
    var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    var password = $("#password").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    var mobile_reg = /^[0-9-+]+$/;
    var Mobile= $("#Mobile").val();
    
    
    if (fname !== '') {
        $("#username").hide();
    }
    else {
        $("#username").html("Please fill firstname");
        $("#username").show();
        return false;

    }
    if (email == '') {
        $("#ename").html("Please enter the email");
        $("#ename").show();
        return false;
    }
    else if (pattern_email.test(email)) {
        $("#ename").hide();
    }
    else {
        $("#ename").html("Please enter the valid email");
        $("#ename").show();
        return false;
    }
    if (password == '') {
        $("#pass").html("Please enter the password");
        $("#pass").show();
        return false;
    }
    else if (pattern.test(password)) {
        $("#pass").hide();
    }
   else {
        $("#pass").html("Please enter the valid password according to following rules");
        $("#pass").show();
        return false;
    }
    if (cpassword == '') {
        $("#cpass").html("Please enter confirm password");
        $("#cpass").show();
        return false;
    }
    else if (password !== cpassword) {
        $("#cpass").html("Password must match");
        $("#cpass").show();
        return false;
    }
    else {
        $("#cpass").hide();
    }
    if(Mobile == ''){
        $("#mono").html("Please fill mobile number");
        $("#mono").show();
        return false;
        }
    else if(mobile_reg.test(Mobile)){
        $("#mono").hide();
    }
    else{
        $("#mono").html("Please enter valid mobile number");
        $("#mono").show();

        return false;
    }
    var data = new FormData($('#myform')[0]);
    data.append("action","submit_reg_form");

    console.log(data);
   // alert("coming");
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: data,
        // async: false,
        cache: false,
        dataType: 'text',
        contentType: false,
        processData: false,
       
        success: function (msg) {
            if(msg.trim() == "duplicate"){
                alert("Email already exist");
                return false;
            }
            else{
                alert("Succesfully registered,, Please Login");
                window.location.href("index.php");
            } 
        } 

    });
    
});
$("#login").click(function(){
    //alert("coming");
    $("#ename").hide();
    var pattern_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $("#email").val();
    if (email == '') {
        $("#ename").html("Please enter the email");
        $("#ename").show();
        return false;
    }
    else if (pattern_email.test(email)) {
        $("#ename").hide();
    }
    else {
        $("#ename").html("Please enter the valid email");
        $("#ename").show();
        return false;
    }
var data = new FormData($('#loginform')[0]);
data.append("action","login_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
       if(msg.trim()== "success"){
           alert("login successful");
           window.location.href= "product.php";
       }
        
       else{
           alert("Please check either the email or password is wrong");
        }
    } 

    });
});
$("#checkout").click(function(){
    // alert("coming");
    var fname = $("#fname").val();
    var pattern_email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $("#email").val();
    var ship_add = $("#adr").val();
    var s_city = $("#city").val();
    var s_state = $("#state").val();
    var s_zip = $("#zip").val();
    var bill_add = $("#b_adr").val();
    var b_city= $("#b_city").val();
    var b_state = $("#b_state").val();
    var b_zip = $("#b_zip").val();
    var cardname = $("#cname").val();
    var cardnum = $("#ccnum").val();
    var card_expdate = $("#expdate").val();
    // var card_expyear = $("#expyear").val();
    var card_cvv = $("#cvv").val();
    var card_num_reg = /^4[0-9]{12}(?:[0-9]{3})?$/;
    var card_exp_reg =/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;
    var card_cvv_reg = /^[0-9]{3,4}$/;
    var check1=$("input[type='checkbox']:checked");

    if (fname == '') {
        alert("Please Fill Fullname");
        return false;
    }
    if (email == '') {
        alert("Please Fill Email");
    }
    else if (pattern_email.test(email)) {
        $("#ename").hide();
    }
    else {
        alert("Please Enter Valid Email");
        return false;
    }
    if (ship_add == '') {
        alert("Please Fill Shipping Address");
        return false;
    }
    if (s_city == '') {
        alert("Please Fill Shipping City");
        return false;
    }
    if(s_state == ''){
        alert("Please Fill Shipping State");
        return false;
        }
    if(s_zip == ''){
            alert("Please Fill Shipping Zip");
            return false;
    }
    if(check1.length>0){
        ship_add = bill_add;
        s_city = b_city;
        s_state = b_state;
        s_zip = b_zip;
    }
    else{
        if (bill_add == '') {
            alert("Please Fill Billing Address");
            return false;
        }
        if (b_city == '') {
            alert("Please Fill Billing City");
            return false;
        }
        if(b_state == ''){
            alert("Please Fill Billing State");
            return false;
            }
        if(b_zip == ''){
                alert("Please Fill Billing Zip");
                return false;
        }
    }
    if (cardname == '') {
        alert("Please Fill Cardname");
        return false;
    }
    if (cardnum == '') {
        alert("Please Fill Card Number");
        return false;
    }
    else if (card_num_reg.test(cardnum)) {
        $("#cardno").hide();
    }
    else {
        alert("Please Enter Valid Card number");
        return false;
    }
    if(card_expdate == ''){
        alert("Please Fill Card Expiry Date");
        return false;
    }
    else if (card_exp_reg.test(card_expdate)) {
            $("#cardno").hide();
    }
    else {
            alert("Please Enter Valid Expiry Date");
            return false;
    }
    if(card_cvv == ''){
        alert("Please Fill Cvv No.");
        return false;
    }
    else if (card_cvv_reg.test(card_cvv)) {
        $("#cardno").hide();
    }
    else {
            alert("Please Enter Valid CVV");
            return false;
    }
    console.log(bill_add);

var data = new FormData($('#checkoutform')[0]);
data.append("action","checkout_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
       if(msg.trim()== "Order is not deliverable at this location"){
           alert("Order is not deliverable at this location, Only deliverable in rajasthan");
       }
       else if(msg.trim()== "Applied Voucher is not valid"){
        alert("Applied Voucher is not valid");
        
       }
       else if(msg.trim()== "Applied discount is not valid on this order"){
        alert("Applied discount is not valid on this order");
        
       }
       else{
        alert("Order Placed Successfully");
        window.location.href= "dashboard.php";

        }
    } 

    });
});
function filterbydate(){
    var data = new FormData($('#filterdteform')[0]);
    data.append("action","filterdate_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
        console.log(msg);
        $('#data_table').append(msg);
    } 

    });
}
function filterbyweek(){
    var data = new FormData($('#filterweekform')[0]);
    data.append("action","filterweek_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
        $('#data_table').append(msg);
    } 

    });
}
function filterbymonth(){
    var data = new FormData($('#filtermonthform')[0]);
    data.append("action","filtermonth_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
        $('#data_table').append(msg);
    } 

    });
}
function filterbyyear(){
    var data = new FormData($('#filteryearform')[0]);
    data.append("action","filteryear_data");

console.log(data);
//alert("coming");
$.ajax({
    type: "POST",
    url: "ajax.php",
    data: data,
    // async: false,
    cache: false,
    dataType: 'text',
    contentType: false,
    processData: false,
   
    success: function (msg) {
        $('#data_table').append(msg);
    } 

    });
}