<?php
include './header.php';
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <title>Login Form | CodingLab</title> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="./css/login.css">

  </head>
  
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Forget Password</span></div>
        <form action="./resorts/src/pass-for.php" method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email" required>
          </div>
         
          <div class="col-md-12 col-xs-12 form-group">
                <div class="form-group">
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfqasQhAAAAAAdC75xiLHUsbIdFst_wqwRmkqB6" required>
                    </div>
                    <span id="captcha_error" class="text-danger"></span>
                </div>
            </div>
          <div class="pass"><a href="./forget-password">Login</a></div>
          <div class="row button">
            <input id="login" type="submit" disabled name="forget-pass" >
          </div>
          <div class="signup-link">Not a member? <a href="./register">Signup now</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
<script>
    function recaptchaCallback() {
        $('#login').removeAttr('disabled');
    };
</script>
