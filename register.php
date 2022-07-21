<?php
require("../header.html");
include './conn.php';
?>
<body>
    <div class="booking-part">
        <div class="inside-booking">
        <!-- <form id="checkout-selection" action="payment/pay.php" method="POST">	 -->
            <!-- <form method="post" action="checkout.php">
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
            </form> -->
        </div>
    </div>


<style>
    /*set border to the form*/
     
    form {
        border: 3px solid #f1f1f1;
    }
    /*assign full width inputs*/
     
    input[type=text],input[type=email],input[type=number],
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
 
    <h2>Login Form</h2>
    <!--Step 1 : Adding HTML-->
    <form action="./php/lg_rg_main.php" method="POST">

        <div class="container">
            <label><b>Name</b></label>
            <input type="text"  placeholder="Enter Username" name="full_name" required>

            <label><b>Phone Number</b></label>
            <input type="number"  placeholder="Enter Phone Number" name="phone_num" required>

            <label>Email(As Username)</label>
            <input type="email" name="email" >

            <label>Password</label>
            <input type="Password"  name="password" >

            <label>Confirm Password</label>
            <input type="Password"  name="password" >

            <!-- <input type="submit" name="register" value=""> -->
            <button type="submit" name="register">Register</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>
 
        <div class="container" style="background-color:#f1f1f1">
           
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
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
// if(isset($_POST['firstname']) && $_POST['firstname'] && isset($_POST['phone_number']) && $_POST['phone_number'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password'] && isset($_POST['Cpassword']) && $_POST['Cpassword']) && ($_POST['password']==$_POST['Cpassword']){
//     $name=$_POST['firstname']." ".$_POST['lastname'];
//     register($name,$_POST['phone_number'],$_POST['email'],$_POST['password']);
// }