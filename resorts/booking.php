<?php
include './conn.php';
     
// $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
            $query="select * from customer_book";
            $pg_query=pg_query($connect,$query);
            //$result=pg_fetch_all($pg_query);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Date Of Booking</th>
                    <th> Customer NAME</th>
                    <th>Number Of ADULT</th>
                    <th>Number Of Child CHILD</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>day on which tickets booked</th>
                    <th>Day Of Booking</th>
                </tr>
            <?php
            while($result=pg_fetch_row($pg_query)){
            //for($i=0;$i<count($result);$i++){ 
            ?>
                <tr>
                <td><?php print_r($result[$i]['booking_id']); ?></td>
                <td><?php print_r($result[$i]['date_of_booking']); ?></td>
                <td><?php print_r($result[$i]['customer_name']); ?></td>
                <td><?php print_r($result[$i]['num_adult']); ?></td>
                <td><?php print_r($result[$i]['num_child']); ?></td>
                <td><?php print_r($result[$i]['phone_number']); ?></td>
                <td><?php print_r($result[$i]['email']); ?></td>
                <td><?php print_r($result[$i]['day_of_booking']); ?></td>
                <td><?php print_r($result[$i]['resort_id']); ?></td>
                </tr>
            <?php
            }
            ?>
            </table>


            <style>
td,th{
    height:20px;
    width:100px;
    border:1px solid black;
   
}
</style>
<h1>paid bookings</h1>

<?php
            $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
            $query="select * from paid_booking";
            $pg_query=pg_query($connect,$query);
            $result=pg_fetch_all($pg_query);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Paid</th>
                    <th>payment_id</h1>
                    <th>Date Of Booking</th>
                    <th>Customer NAME</th>
                    <th>Number Of ADULT</th>
                    <th>Number Of Child CHILD</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Resort Name</th>
                    <th>Amount</th>
                </tr>
            <?php
            for($i=0;$i<count($result);$i++){ 
            ?>
                <tr>
                <td><?php print_r($result[$i]['booking_id']); ?></td>
                <td><?php print_r($result[$i]['paid']); ?></td>
                <td><?php print_r($result[$i]['payment_id']); ?></td>
                <td><?php print_r($result[$i]['date_of_book']); ?></td>
                <td><?php print_r($result[$i]['name']); ?></td>
                <td><?php print_r($result[$i]['num_adult']); ?></td>
                <td><?php print_r($result[$i]['num_child']); ?></td>
                <td><?php print_r($result[$i]['phone']); ?></td>
                <td><?php print_r($result[$i]['email']); ?></td>
                <td><?php print_r($result[$i]['resort_name']); ?></td>
                <td><?php print_r($result[$i]['amount']); ?></td>
                </tr>
            <?php
            }
            ?>
            </table>


            <style>
td,th{
    height:20px;
    width:100px;
    border:1px solid black;
   
}
</style>