<?php
require("../header.html");
?>
<body>
    <div class="booking-part">
        <div class="inside-booking">
        <!-- <form id="checkout-selection" action="payment/pay.php" method="POST">	 -->
            <!-- <form method="post" action="">
                <label>Email</label><br>
                <input type="Email" id="email" name="email" class="input-tag"><br>

                <label>Password</label><br>
                <input type="Password" id="password" name="password" class="input-tag"><br>

                <input type="submit" class="btn btn-primary buy_now" value="Book Now">
            </form> -->
        </div>
    </div>
</body>
<?php

if(isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']){
    #validate($_POST['email'],$_POST['password']);
}
//takes name,email,phone number,password,date of birth
?>


<!DOCTYPE html>
<html>
<style>
    /*set border to the form*/
     
    form {
        border: 3px solid #f1f1f1;
    }
    /*assign full width inputs*/
     
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    /*set a style for the buttons*/
     
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    /* set a hover effect for the button*/
     
    button:hover {
        opacity: 0.8;
    }
    /*set extra style for the cancel button*/
     
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }
    /*centre the display image inside the container*/
     
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }
    /*set image properties*/
     
    img.avatar {
        width: 40%;
        border-radius: 50%;
    }
    /*set padding to the container*/
     
    .container {
        padding: 16px;
    }
    /*set the forgot password text*/
     
    span.psw {
        float: right;
        padding-top: 16px;
    }
    /*set styles for span and cancel button on small screens*/
     
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
 
<body>
    <!-- $salt = sha1(uniqid());
    $student_password = sha1($password . $salt); -->


   
 
    <h2>Login Form</h2>
    <!--Step 1 : Adding HTML-->
    <form action="./php/lg_rg_main.php" method="POST">
      
 
        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
 
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
 
            <button type="submit" name="login">Login</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>
 
        <div class="container" style="background-color:#f1f1f1">
           
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
    
</body>
 <?php
require("../footer.html");
 ?>
</html>
