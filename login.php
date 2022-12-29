<?php
include './header.php';
require('./conn.php');
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login Form | CodingLab</title> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="./css/login.css">
  </head>
  
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="./resorts/lg_rg_main.php" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="uname" placeholder="Email or Phone" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" name="login" >
          </div>
          <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </form>
      </div>
    </div>

  </body>
</html>

<?php
require("./header.php");
if(isset($_SESSION['email']) && isset($_SESSION['logged_in'])){
    header('Location: ./index.php');
}
?>

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
    <form action="./resorts/lg_rg_main.php" method="POST">
      
 
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
        <span class="psw">&nbsp; &nbsp;</span>
            <span class="psw">Don't Have Account <a href="./register.php">Register Here</a></span>
        </div>
    </form>
    
</body>
 <?php
require("./footer.html");
 ?>
</html>