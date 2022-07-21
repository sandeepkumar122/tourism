<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>     
<head>
<?php
require("./header.php");
session_start();
// include './conn.php';
 $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
/*
$pg_query=pg_query($connect,$query);
$result=pg_fetch($pg_query);
https://www.tutsmake.com/php-razorpay-payment-gateway-integration-example/
if($result){
   echo "true";
}
else{
   echo "false";
}
$name="sandeep";
         
         $to_email = "sandeepkumargupta9702@gmail.com";
         $subject = "Simple Email Test via PHP";
         $body = "Hi, This is test email send by PHP Script";
         $headers = "From: sender email";
         $bool=mail($to_email, $subject, $body, $headers);
         if ($bool) {
             echo "Email successfully sent to $to_email...";
         } else {
             echo "Email sending failed...";
         }
         key screte:- SGYtoWsPuOAXi6Uvl1laigS9
         key id:- rzp_test_ndjLGQvKyoEZCo
*/
$id=$_GET['id'];
if(isset($id) && strlen($id)>0){
//$name=$_GET['id'];
//$pname = str_replace("_"," ",$name);
//echo "$pname";
$query="select * from park where id=$id";
$pg_query=pg_query($connect,$query);
$result=pg_fetch_all($pg_query);
if(pg_num_rows($pg_query)<=0){
    $query="select * from park_theme where id=$id";
    $pg_query=pg_query($connect,$query);
    $result=pg_fetch_all($pg_query);
    if(pg_num_rows($pg_query)<=0){
        $query="select * from educational where id=$id";
        $pg_query=pg_query($connect,$query);
        $result=pg_fetch_all($pg_query);
    }
}


$result=pg_fetch_all($pg_query);

?>
<!--
<form>
$mail=mail("sandeepgupta970285@gmail.com","first","example");
if($mail==true){
echo "message sent successfull";
}else{
echo "unsuccessfull";
}
</form>
https://razorpay.com/docs/payments/server-integration/php/payment-gateway/build-integration/
https://www.youtube.com/watch?v=CUgvn0U_Qx4
-->

<html>
   <body> 
      <?php
    
         for($i=0;$i<count($result);$i++){
      ?>
    <div class="main-container">
        <div class="sub-container">
            <a href="main.php?id=123">
                <img src=<?php print_r($result[$i]['dir']); ?> class="image-11">
            </a>
        </div>
        <div class="info-11">
            <h1 style="text-align:center;"><?php  print_r($result[$i]['name']);?></h1>
            <div class="block-part">
                <h4>Group Picnic(For Group Picnic Member Must Be Greater Then 20)</h4>
                <div >
                    <h4>Children Price(Height Less then 3.6 Feet)</h4><br>
                    <del><?php print_r($result[$i]['child_price']-100) ?> </del>
                    <h4><?php print_r($result[$i]['child_price']) ?> </h4>
                </div>
                <div>
                    <h4>Adult Price(Height more then 3.6 Feet)</h4><br>
                    <h4 id="data-amount"><?php print_r($result[$i]['adult_price']) ?> </h4>
                </div>
            </div>
            
            <!-- <div class="block-part">
            <h4>water park features</h4>
                <div>
                    <h4>Children Price(Height Less then 3.6 Feet)</h4><br>
                    <h4><?php print_r($result[$i]['child_price']) ?> </h4>
                </div>
                <div>
                    <h4>Adult Price(Height more then 3.6 Feet)</h4><br>
                    <h4><?php print_r($result[$i]['adult_price']) ?> </h4>
                </div>
            </div> -->
        </div>
    </div>
    <div class="booking-part">
        <div class="inside-booking">
        <!-- <form id="checkout-selection" action="payment/pay.php" method="POST">	 -->
            <form method="post" action="checkout.php">
                <label>date of booking</label><br>
                <input type="date" id="bookingDate" name="bookingDate" class="input-tag"><br>
                <label>name</label><br>
                <input type="text" id="name" name="cust_name" class="input-tag"><br>
                <label>number of adults</label><br>
                <input type="number" id="adult" name="adult" class="input-tag"><br>
                <label>Child</label><br>
                <input type="number" id="child" name="child" class="input-tag"><br>
                <label>Phone Number</label><br>
                <input type="phone" id="phone" name="phone" class="input-tag"><br>
                <label>Email</label><br>
                <input type="Email" id="email" name="email" class="input-tag"><br>
                <input type="hidden" id="resort_name" name="resort_id" value="<?php print_r($id) ?>"><br>
                <input type="hidden" id="resort_name" name="resort_name" value="<?php print_r($result[$i]['name']) ?>"><br>
                <input type="hidden" name="child_price" value="<?php print_r($result[$i]['child_price'])?>">
                <input type="hidden" name="adult_price" value="<?php print_r($result[$i]['adult_price'])?>">
                <input type="submit" class="btn btn-primary buy_now" value="Book Now">
               				
                
                
            </form>
           
         </div>
    </div>
   </body>
  
</html>
<!-- dateOfBooking,customerName,numberOfAdults,numberOfChild,phoneNumber,email,resortBookDate(now), -->
<?php
}
}
require("../footer.html");

?>

<style>
     @media only screen and (max-width: 600px) {
       body{
        background-color: blue;
       }
   }

    .main-container{
        margin-top:20px;
    }
    .sub-container{
        text-align:center;
    }
    .image-11{
       
        height: 300px;
        width: 900px;
    }
   
    .headi{
        text-align:center;
    }
    .flex{
      display:flex;
    }
    .block-part{
        display:inline-block;
        width:30%;
    }
    .info-11{
        text-align:center;
    }
    .inside-booking{
        border:1px solid black;
        text-align:center;
        width:60%;
        border-radius: 5px;
        background-color: #87CEFA;
        padding: 20px;
        
    }
   .booking-part{
       width:100%;
       margin-left:250px;
   }
   .input-tag{
    padding: 8px 24px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
   }
   body{
    background-color: #f2f2f2;
   }



  
    </style>

    <?php
//  $to_email = "sandeepkumargupta9702@gmail.com";
//  $subject = "Simple Email Test via PHP";
//  $body = "Hi, This is test email send by PHP Script";
//  $headers = "From: sender email";
//  $bool=mail($to_email, $subject, $body, $headers);
//  if ($bool) {
//      print_r(mail($to_email, $subject, $body, $headers));
//      echo "Email successfully sent to $to_email...";
//  } else {
//      echo "Email sending failed...";
//  }
    ?>