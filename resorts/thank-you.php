<?php
require("./header.php");
include './conn.php';

?>
<div class="main-container">
   <div>
      <h1>You Booking is Been done</h1>
<?php if(isset($_SESSION['payment_id']) && $_SESSION['payment_id']){ ?>
   <h3>Name: <?php print_r($_SESSION['name']);?> </h3>
      <h3>Resort Name: <?php print_r($_SESSION['resort_name']); ?> </h3>
      <h3>Booking Id: <?php print_r($_SESSION['booking_id']); ?> </h3>
      <h3>Number Of Children: <?php print_r($_SESSION['child']); ?> </h3>
      <h3>Number Of Adult: <?php print_r($_SESSION['adult']);?> </h3>
      <h3>Email: <?php print_r($_SESSION['email']); ?> </h3>
      <h3>Amount: <?php print_r($_SESSION['amount']); ?> </h3>
      <h3>Date Of Booking: <?php print_r($_SESSION['date_of_book']); ?> </h3>
      <h3>Phone: <?php print_r($_SESSION['phone']); ?> </h3>
      <h3>Payment Id: <?php print_r($_SESSION['payment_id']); ?></h1>
<?php }else{ ?>
   <div id="printableArea">
   <h3>Name: <?php print_r($_SESSION['name']);?> </h3>
      <h3>Resort Name: <?php print_r($_SESSION['resort_name']); ?> </h3>
      <h3>Booking Id: <?php print_r($_SESSION['booking_id']); ?> </h3>
      <h3>Number Of Children: <?php print_r($_SESSION['child']); ?> </h3>
      <h3>Number Of Adult: <?php print_r($_SESSION['adult']);?> </h3>
      <h3>Email: <?php print_r($_SESSION['email']); ?> </h3>
      <h3>Amount: <?php print_r($_SESSION['amount']); ?> </h3>
      <h3>Date Of Booking: <?php print_r($_SESSION['date_of_book']); ?> </h3>
      <h3>Phone: <?php print_r($_SESSION['phone']); ?> </h3>
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

