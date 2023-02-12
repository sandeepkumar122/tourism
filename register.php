<?php
require("./header.php");
include './resorts/conn.php';

if (isset($_SESSION['email']) && isset($_SESSION['logged_in'])) {
    header('Location: ./index');
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

    <form action="./resorts/lg_rg_main" method="POST">
        <div class="container">
            <label><b>Name</b></label>
            <input type="text" required placeholder="Enter Username" name="full_name">

            <label><b>Phone Number</b></label>
            <input type="number" required maxlength="10" placeholder="Enter Phone Number" name="phone_num">

            <label>Email(As Username)</label>
            <input type="email" required name="email" id="email">

            <label>Password</label>
            <input type="Password" required id="MainPassword" >
            <p><input type="checkbox" id="show_pass_check">Show Password</p>
            <br>
            <!-- <span class="psw">Forgot <a href="#">Show Password</a></span> -->

            <label>Confirm Password</label>
            <input type="Password" required id="cpassword" onchange="checkPass(this)" >
            <input type="hidden" name="pwd" id="password">

            <div class="col-md-12 col-xs-12 form-group">
                <div class="form-group">
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfqasQhAAAAAAdC75xiLHUsbIdFst_wqwRmkqB6" required>
                    </div>
                    <span id="captcha_error" class="text-danger"></span>
                </div>
            </div>


            <button type="submit" id="register" name="register" disabled>Register</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>

        <div class="container" style="background-color:#f1f1f1">

            <span class="psw">Forgot <a href="./register">password?</a></span>
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
    function checkPass(txt){
        // let pass=$("#MainPassword").value;
        let pass=document.getElementById("MainPassword").value;
        if(pass!=txt.value){
            alert("Password Does Not Match With Confirm Password!!!")
            txt.value="";
        }
        let hash=encrypt(pass);
        $("#password").val(hash);
        // console.log(txt.value)
    }
</script>
<script src="./asset/js/tr.js"></script>