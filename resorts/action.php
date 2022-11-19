<?php
require("./header.php");
include './conn.php';

if (isset($_SESSION['email'])) {
    $booking_id = $_GET['book'];
    $select_query = "select * from paid_booking where email='" . $_SESSION['email'] . "' and booking_id='$booking_id'";
    $pg_query_select = pg_query($connect, $select_query);
    $result = pg_fetch_all($pg_query_select);
    for ($i = 0; $i < count($result); $i++) {
?>
        <div class="booking-part">
            <div class="inside-booking">
    
                <form method="post" action="processing.php">
                    <div>
                        <label>date of booking</label><br>
                        <input type="date" value="<?php echo $result[$i]['date_of_book']; ?>" id="bookingDate" readonly name="bookingDate" class="input-tag"><br>
                    </div>
                    <div>
                        <label>name</label><br>
                        <input type="text" value="<?php echo $result[$i]['name']; ?>" id="name" name="cust_name" readonly class="input-tag"><br>
                    </div>
                    <div>
                        <label>number of adults</label><br>
                        <input type="number" value="<?php echo $result[$i]['num_adult']; ?>" id="adult" name="adult" readonly class="input-tag"><br>
                    </div>
                    <div>
                        <label>Child</label><br>
                        <input type="number" value="<?php echo $result[$i]['num_child']; ?>" id="child" name="child" readonly class="input-tag"><br>
                    </div>

                    <div>
                        <label>Phone Number</label><br>
                        <input type="phone" value="<?php echo $result[$i]['phone']; ?>" id="phone" name="phone" readonly class="input-tag"><br>
                    </div>
                    <div>
                        <label>Email</label><br>
                        <input type="Email" value="<?php echo $result[$i]['email']; ?>" id="email" name="email" readonly class="input-tag"><br>
                    </div>

                    <div>
                        <label>Amount</label><br>
                        <input type="number" value="<?php echo $result[$i]['amount']; ?>" id="child" name="amount" readonly class="input-tag"><br>
                    </div>
                    <div>
                        <label>Resort Name</label><br>
                        <input type="text" value="<?php echo $result[$i]['resort_name']; ?>" id="child" name="resort_name" readonly class="input-tag"><br>
                    </div>

                    <input type="submit" class="btn btn-danger" name="cancel" value="Cancel Booking">
                    <input type="submit" class="btn btn-primary" name="Update Booking" value="Update Booking">
                </form>
                <button class="btn btn-success" onclick="printDiv('printableArea');" >Print Ticker</button>
            </div>
            
        </div>
        <script>
            function printDiv(divName) {
             
                // var aTags = document.getElementsByTagName('a');
                // var atl = aTags.length;
                // var i;
                // for (i = 0; i < atl; i++) {
                //     aTags[i].removeAttribute("href");
                //     aTags[i].text = '';
                // }

                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>

<?php
    }
}
require("../footer.html");

?>