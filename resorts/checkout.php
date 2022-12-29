<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <head>

        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        require("./header.php");

        if (!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])) {
            header('Location: ../register.php');
        }

        $name = $_POST['cust_name'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $resort = $_POST['resort_id'];
        $resort_name = $_POST['resort_name'];
        $date_book=$_POST['bookingDate'];
        $today_date = date("Y-m-d");
        $child_price = $_POST['child_price'];
        $adult_price = $_POST['adult_price'];
        $total = $child_price * $child + $adult_price * $adult;


        ?>

        <div>
            <div class="card" style="text-align:center ;">
                <div class="card-header">
                    <h1>Please Confirm...</h1>
                </div>
                <div class="card-body" style="background-color: #32bd27 ;color:white">

                    <h3>Name: <?php print_r($_POST['cust_name']); ?> </h3>
                    <h3>Park Name: <?php print_r($_POST['resort_name']); ?><h3>
                            <h3>Number Of Children: <?php print_r($_POST['child']); ?> </h3>
                            <h3>Number Of Adult: <?php print_r($_POST['adult']); ?> </h3>
                            <h3>Email: <?php print_r($_POST['email']); ?> </h3>
                            <h3>Amount: ₹ <?php echo ($total); ?> </h3>
                            <h3>Date Of Booking: <?php print_r($_POST['bookingDate']); ?> </h3>
                            <h3>Phone: <?php print_r($_POST['phone']); ?> </h3>
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary buy_now">Pay Now</a>

                </div>
            </div>

            <form method="post" action="processing.php">
                <input type="text" hidden name="customer" value="<?php print_r($_POST['cust_name']); ?>">
                <input type="text" hidden name="resort_id" value="<?php print_r($resort); ?>">
                <input type="text" hidden name="resort_name" value="<?php print_r($_POST['resort_name']); ?>">
                <input type="text" hidden name="child" value="<?php print_r($_POST['child']); ?>">
                <input type="text" hidden name="adult" value="<?php print_r($_POST['adult']); ?>">
                <input type="text" hidden name="email" value="<?php print_r($_POST['email']); ?>">
                <input type="text" hidden name="total" value="<?php print_r($total); ?>">
                <input type="text" hidden name="bookingDate" value="<?php print_r($_POST['bookingDate']); ?>">
                <input type="text" hidden name="phone" value="<?php print_r($_POST['phone']); ?>">
                <input type="text" hidden name="paid" value="no">
                <input type="submit" class="btn btn-sm btn-secondary" value="Pay Later">
            </form>
        </div>
        <input type="hidden" id="dateBook" value="<?php echo ($date_book); ?>">
        <?php
        ?>
        <input type="hidden" value="<?php echo ($total); ?>" id="data-amount">
        <input type="hidden" value="<?php echo ($resort); ?>" id="data-id">

        <!-- <button type="button" data-id="<?php echo ($resort); ?>" data-amount="<?php echo ($total); ?>" id="buy_now">Pay Now</button> -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            $('body').on('click', '.buy_now', function(e) {

                var totalAmount = <?php echo ($total); ?>;
                var product_id = <?php echo ($resort); ?>;
                var resort_name = "<?php echo ($resort_name); ?>";
                var email_id = "<?php echo ($email); ?>";
                var date_of_book = document.getElementById("dateBook").value;
                var name = "<?php echo ($name); ?>";
                var phone = "<?php echo ($phone); ?>";
                var child = <?php echo ($child); ?>;
                var adult = <?php echo ($adult); ?>;

                var options = {
                    "key": "rzp_test_ndjLGQvKyoEZCo",
                    "amount": totalAmount * 100,
                    "name": "Picnic",
                    "description": "Payment",
                    "image": "",
                    "handler": function(response) {

                        console.log(response);
                        $.ajax({
                            url: 'processing.php',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                total_Amount: totalAmount,
                                Product_id: product_id,
                                email: email_id,
                                dateOfBook: date_of_book,
                                customer_name: name,
                                phone: phone,
                                child: child,
                                adult: adult,
                                resort_name: resort_name
                            },
                            success: function(msg) {
                              
                                if (msg.success == "1") {

                                    window.location.href = 'thank-you.php';
                                } else {
                                    alert("error");
                                }
                                // alert("from ajax");
                                console.log(msg);

                            },
                            error: function(msg) {
                                console.log(msg);
                                alert("from error");
                            }

                        })
                    },
                    "theme": {
                        "color": "#528FF0"
                    }

                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();
            });
        </script>


        <?php
      
        require("../footer.html");

        ?>