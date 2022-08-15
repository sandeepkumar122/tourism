<?php
require("./header.php");
include './php/conn.php';

if (isset($_SESSION['email']) && isset($_SESSION['logged_in'])) {
    header('Location: ./index.php');
}
?>

<head>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/css/boostrap.min.css">
    <script src="./asset/js/min.js"></script>
    <script src="./asset/js/tr.js"></script>
</head>

<body>
    <h2>Login Form</h2>
    <form action="./php/lg_rg_main.php" method="POST">
        <div class="container">
            <label><b>Name</b></label>
            <input type="text" placeholder="Enter Username" name="full_name">

            <label><b>Phone Number</b></label>
            <input type="number" placeholder="Enter Phone Number" name="phone_num">

            <label>Email(As Username)</label>
            <input type="email" name="email">

            <label>Password</label>
            <input type="Password" name="password">
            <input type="checkbox" id="show_pass" onclick="show_pass(this)">Show Password
            <br>
            <!-- <span class="psw">Forgot <a href="#">Show Password</a></span> -->

            <label>Confirm Password</label>
            <input type="Password" name="password">

            <button type="submit" name="register">Register</button>
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