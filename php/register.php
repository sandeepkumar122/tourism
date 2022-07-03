<?php
require("../header.html");
include './conn.php';
?>
<body>
    <div class="booking-part">
        <div class="inside-booking">
        <!-- <form id="checkout-selection" action="payment/pay.php" method="POST">	 -->
            <form method="post" action="checkout.php">
                <label>First Name</label><br>
                <input type="text" id="firstname" name="firstname" class="input-tag"><br>

                <label>Last Name</label><br>
                <input type="text" id="lastname" name="lastname" class="input-tag"><br>

                <label>Phone Number</label><br>
                <input type="number" id="phone_number" name="phone_number" class="input-tag"><br>

                <label>Email</label><br>
                <input type="Email" id="email" name="email" class="input-tag"><br>

                <label>Password</label><br>
                <input type="Password" id="password" name="password" class="input-tag"><br>

                <label>Confirm Password</label><br>
                <input type="Password" id="Cpassword" name="Cpassword" class="input-tag"><br>

                <input type="submit" class="btn btn-primary buy_now" value="Book Now">
            </form>
        </div>
    </div>
</body>
<?php
require("../footer.html");
//takes name,email,phone number,password,date of birth
//alter table paid_booking add column userid;
// create register user table with auto increament userid
// CREATE EXTENSION pgcrypto;
// create table user(id SERIAL PRIMARY KEY,name varchar(255),phone_number bigint,email varchar(100),password TEXT NOT NULL);
// insert into user(name,phone_number,email,password) values ( name,phone,email, crypt('johnspassword', gen_salt('bf')))
// select * from user where email="sandeep@gmail.com" and password= crypt('$_POST['password]', password);

?>
<?php
if(isset($_POST['firstname']) && $_POST['firstname'] && isset($_POST['phone_number']) && $_POST['phone_number'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password'] && isset($_POST['Cpassword']) && $_POST['Cpassword']) && ($_POST['password']==$_POST['Cpassword']){
    $name=$_POST['firstname']." ".$_POST['lastname'];
    register($name,$_POST['phone_number'],$_POST['email'],$_POST['password']);
}