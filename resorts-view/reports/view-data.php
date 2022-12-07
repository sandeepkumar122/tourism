<tr>
    <th><?php echo $total_book[$j]['booking_id'] ?></th>
    <th><?php echo $total_book[$j]['name'] ?></th>
    <th><?php echo $total_book[$j]['phone'] ?></th>
    <th><?php echo $total_book[$j]['email'] ?></th>
    <th><?php echo $total_book[$j]['paid'] ?></th>
    <th><?php echo $total_book[$j]['payment_id'] ?></th>
    <th><?php echo $total_book[$j]['amount'] ?></th>
    <th><?php echo $total_book[$j]['date_of_book'] ?></th>
    <th><?php echo $total_book[$j]['num_adult'] ?></th>
    <th><?php echo $total_book[$j]['num_child'] ?></th>
    <th><?php echo $total_book[$j]['resort_name'] ?></th>
    <th><?php echo $total_book[$j]['day_of_booking'] ?></th>
    <th><?php echo $resu=check_status($total_book[$j]['status']) ?></th>
    <th><?php  if($total_book[$j]['status']==1){ ?> <a href="./main.php?booking_id=<?php echo $total_book[$j]['booking_id'] ?>&action=-1">Cancel Booking</a>  <?php } ?></th>
    <th></th>
</tr>