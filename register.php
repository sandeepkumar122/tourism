<?php
require("./header.php");
include './php/conn.php';

if (isset($_SESSION['email']) && isset($_SESSION['logged_in'])) {
    header('Location: ./index.php');
}
?>

<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/css/boostrap.min.css">
    <script src="./asset/js/min.js"></script>
    <script src="./asset/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>
 
    <form action="./php/lg_rg_main.php" method="POST">
        <div class="container">
            <label><b>Name</b></label>
            <input type="text" placeholder="Enter Username" name="full_name">

            <label><b>Phone Number</b></label>
            <input type="number" maxlength="10" placeholder="Enter Phone Number" name="phone_num">

            <label>Email(As Username)</label>
            <input type="email" name="email" id="email">

            <label>Password</label>
            <input type="Password" id="password" name="password">
            <p><input type="checkbox" id="show_pass_check" >Show Password</p> 
            <br>
            <!-- <span class="psw">Forgot <a href="#">Show Password</a></span> -->

            <label>Confirm Password</label>
            <input type="Password" id="cpassword" name="password">

            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeqEHkgAAAAAIUWCYFLXtWnK7VtOXUqvGq_53sr" required>
                  </div>
                  <span id="captcha_error" class="text-danger"></span>

            <button type="submit" id="register" name="register" disabled>Register</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>

        <div class="container" style="background-color:#f1f1f1">

            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>
<?php
require("./footer.html");

?>
<script>
    function recaptchaCallback() {
  $('#register').removeAttr('disabled');
};
</script>
<script src="./asset/js/tr.js"></script>