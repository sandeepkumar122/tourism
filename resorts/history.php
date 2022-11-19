<?php
require("./header.php");
?>
<!DOCTYPE html>
<html>
<style>
table, td, td {
  border:1px solid black;
  border-collapse: collapse;
}
</style>

<body>
<table style="widtd:100%">
<tr>
    <th>Booking Id</th>
    <th>Name</th> 
    <th>Email</th>
    <th>Payment ID</th>
    <th>Amount</th>
    <th>Resort ID</th>
    <th>Date Of Booking</th> 
    <th>Number Of Adult</th>
    <th>Number Of Child</th>
    <th>Resort Name</th>
    <th>Phone</th>
    <th>Day Of Booking</th>
    <th>View Tickets</th>
  </tr>
<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

$email=$_SESSION['email'];


$select_for="select * from paid_booking where email='$email'";
$pg_query_select=pg_query($connect,$select_for);
$result=pg_fetch_all($pg_query_select);
for($i=0;$i<count($result);$i++){ 
?>

  <tr>
    <td><?php echo $result[$i]['booking_id']; ?></td>
    <td><?php echo $result[$i]['name']; ?></td> 
    <td><?php echo $result[$i]['email']; ?></td>
    <td><?php echo $result[$i]['payment_id']; ?></td>
    <td><?php echo $result[$i]['amount']; ?></td>
    <td><?php echo $result[$i]['resort_id']; ?></td>
    <td><?php echo $result[$i]['date_of_book']; ?></td> 
    <td><?php echo $result[$i]['num_adult']; ?></td>
    <td><?php echo $result[$i]['num_child']; ?></td>
    <td><?php echo $result[$i]['resort_name']; ?></td>
    <td><?php echo $result[$i]['phone']; ?></td>
    <td><?php echo $result[$i]['day_of_booking']; ?></td>
    <td><a href="./action.php?book=<?php echo $result[$i]['booking_id']; ?>">View Ticket</a></td>
  </tr>
  <?php 
} ?>
</table>

</body>
</html>

