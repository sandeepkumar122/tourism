<?php
require("./header.php");
include './conn.php';

$name=$_SESSION['name'];
$resort_name=$_SESSION['resort_name'];
$booking_id=$_SESSION['booking_id'];
$num_child=$_SESSION['child_price'];
$num_adult=$_SESSION['adult_price'];
$email=$_SESSION['email'];
$date_of_booking=$_SESSION['date_of_book'];
$phone=$_SESSION['phone'];

$total=$_SESSION['total_amount'];
// echo "<pre>";
// print_r($_SESSION);
?>
<div class="main-container">
   <div>
      <h1>You Booking is Been done</h1>
<?php if(isset($_SESSION['payment_id']) && $_SESSION['payment_id']){ 
   $payment=$_SESSION['payment_id'];
   ?>
   <h3>Name: <?php echo $name; ?> </h3>
      <h3>Resort Name: <?php echo $resort_name ?> </h3>
      <h3>Booking Id: <?php echo $booking_id ?> </h3>
      <h3>Number Of Children: <?php echo $num_child ?> </h3>
      <h3>Number Of Adult: <?php echo $num_adult  ?> </h3>
      <h3>Email: <?php echo $email ?> </h3>
      <h3>Amount: <?php echo $total ?> </h3>
      <h3>Date Of Booking: <?php echo $date_of_booking ?> </h3>
      <h3>Phone: <?php echo $phone ?> </h3>
      <h3>Payment Id: <?php print_r($_SESSION['payment_id']); ?></h1>
      <button onclick="printDiv('printableArea');" >Print Ticker</button>
<?php }else{ ?>
   <div id="printableArea">
   <h3>Name: <?php echo $name; ?> </h3>
      <h3>Resort Name: <?php echo $resort_name ?> </h3>
      <h3>Booking Id: <?php echo $booking_id ?> </h3>
      <h3>Number Of Children: <?php echo $num_child ?> </h3>
      <h3>Number Of Adult: <?php echo $num_adult ?> </h3>
      <h3>Email: <?php echo $email ?> </h3>
      <h3>Amount: <?php echo $total ?> </h3>
      <h3>Date Of Booking: <?php echo $date_of_booking ?> </h3>
      <h3>Phone: <?php echo $phone ?> </h3>
      <h3>Payment : Not Made. Please Make Your Payment On Resort Counter</h3>
   </div>

      <button onclick="printDiv('printableArea');" >Print Ticker</button>
<?php } ?>
     
   </div>
</div>
<script>
   function printDiv(divName) {
    var aTags = document.getElementsByTagName('a');
     var atl = aTags.length;
     var i;
     for (i = 0; i < atl; i++) {
        aTags[i].removeAttribute("href");
        aTags[i].text='';
     } 
    
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
  }
</script>
<style>
.main-container{
   text-align:center;
}
</style>
<?php
require("../footer.html");

?>

