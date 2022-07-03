<?php
require("../header.html");
?>
<body>
    <div class="booking-part">
        <div class="inside-booking">
        <!-- <form id="checkout-selection" action="payment/pay.php" method="POST">	 -->
            <form method="post" action=">
                <label>Email</label><br>
                <input type="Email" id="email" name="email" class="input-tag"><br>

                <label>Password</label><br>
                <input type="Password" id="password" name="password" class="input-tag"><br>

                <input type="submit" class="btn btn-primary buy_now" value="Book Now">
            </form>
        </div>
    </div>
</body>
<?php
require("../footer.html");
if(isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']){
    #validate($_POST['email'],$_POST['password']);
}
//takes name,email,phone number,password,date of birth
?>
