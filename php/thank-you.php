<?php
include './conn.php';
session_start();
?>
<div class="main-container">
   <div>
      <h1>You Booking is Been done</h1>

      <h3>Name: <?php print_r($_SESSION['name']) ?> </h3>
      <h3>Resort Name: <?php print_r($_SESSION['name']) ?> </h3>
      <h3>Booking Id: <?php print_r($_SESSION['name']) ?> </h3>
      <h3>Number Of Children: <?php print_r($_SESSION['child']) ?> </h3>
      <h3>Number Of Adult: <?php print_r($_SESSION['adult']) ?> </h3>
      <h3>Email: <?php print_r($_SESSION['email']) ?> </h3>
      <h3>Amount: <?php print_r($_SESSION['amount']) ?> </h3>
      <h3>Date Of Booking: <?php print_r($_SESSION['date_of_book']) ?> </h3>
      <h3>Phone: <?php print_r($_SESSION['phone']) ?> </h3>
      <h3>Payment Id: <?php print_r($_SESSION['payment_id']); ?></h1>

   </div>
</div>

<style>
.main-container{
   text-align:center;
}
</style>

