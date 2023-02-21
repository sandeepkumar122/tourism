<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../functions/javascript/aes.js"></script>
    <script src="../functions/javascript/encryptionDecrypt.js"></script>
    <head>

        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        // echo "<pre>";
        // print_r($_POST);
        require("./header.php");

        if (!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])) {
            header('Location: ../register');
        }
        if(!isset($_POST['cust_name']) && !isset($_POST['resort_name'])){
            header('Location: ../index');
        }
        $name = pg_escape_string($_POST['cust_name']);
        $adult = pg_escape_string($_POST['adult']);
        $child = pg_escape_string($_POST['child']);
        
        $email = pg_escape_string($_SESSION['email']);
        $resort = pg_escape_string($_POST['resort_id']);
        $resort_name = pg_escape_string($_POST['resort_name']);
        $date_book = pg_escape_string($_POST['bookingDate']);
        $today_date = date("Y-m-d");
       
        $phone = pg_escape_string($_SESSION['phone']);
        // $child_price = $_POST['child_price'];
        // $adult_price = $_POST['adult_price'];
        // $total = $child_price * $child + $adult_price * $adult;

        $timestamp = strtotime($date_book);
        $day = strtolower(date('l', $timestamp));
        if (!isset($_POST['group_picnic'])) {
            $select_for_price = "select * from prices_adult where park_id='" . $resort . "'";
            $pg_price = pg_query($connect, $select_for_price);
            $result_price = pg_fetch_assoc($pg_price);
            array_shift($result_price);
            $price_adult = $result_price[$day];

            $select_for_price_child = "select * from prices_child where park_id='" . $resort . "'";
            $pg_price_child = pg_query($connect, $select_for_price_child);
            $result_price_child = pg_fetch_assoc($pg_price_child);
            array_shift($result_price_child);
            $price_child = $result_price_child[$day];
            $total_price = $result_price[$day] * $adult + $child * $result_price_child[$day];
        } else {

            $select_for_price_group = "select * from prices_group_adult where park_id='" . $resort . "'";
            $pg_price_group = pg_query($connect, $select_for_price_group);
            $result_price_group = pg_fetch_assoc($pg_price_group);
            array_shift($result_price_group);
            $price_adult = $result_price_group[$day];

            $select_for_price_group_child = "select * from prices_group_child where park_id='" . $resort . "'";
            $pg_price_group_child = pg_query($connect, $select_for_price_group_child);
            $result_price_group_child = pg_fetch_assoc($pg_price_group_child);
            array_shift($result_price_group_child);

            $price_child = $result_price_group_child[$day];
            echo  $total_price = ($adult * $price_adult + $child * $price_child);
        }
        $_SESSION['total_amount']=$total_price;
        $_SESSION['adult_count']=$adult;
        $_SESSION['child_count']=$child;
        $_SESSION['resort_id']=$resort;
        $_SESSION['child_price']=$price_child;
        $_SESSION['adult_price']=$price_adult;
        $_SESSION['date_of_booking']=$date_book;
        
        // echo "<pre>";
        // print_r($result_price_group);



        ?>

        <div>
            <div class="card" style="text-align:center ;">
                <div class="card-header">
                    <h1>Please Confirm...</h1>
                </div>
                <div class="card-body" style="background-color: #32bd27 ;color:white">

                    <h3>Name: <?php echo ($name); ?> </h3>
                    <h3>Park Name: <?php echo ($resort_name); ?><h3>
                            <h3>Number Of Children: <?php echo ($child);
                                                    echo " X ";
                                                    echo $price_adult; ?> </h3>
                            <h3>Number Of Adult: <?php echo ($adult);
                                                    echo " X ";
                                                    echo $price_child ?> </h3>
                            <h3>Email: <?php echo ($email); ?> </h3>
                            <h3>Amount: ₹ <?php echo ($total_price); ?> </h3>
                            <h3>Date Of Booking: <?php echo ($date_book); ?> </h3>
                            <h3>Phone: <?php echo ($phone); ?> </h3>
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary buy_now">Pay Now</a>

                </div>
            </div> 

            <form method="post" action="processing">
                <input type="text" hidden name="customer" value="<?php echo $name ?>">
                <input type="text" hidden name="resort_name" value="<?php echo $resort_name ?>">
                <input type="text" hidden name="email" value="<?php echo $email ?>">
                <input type="text" hidden name="bookingDate" value="<?php echo $date_book; ?>">
                <input type="text" hidden name="phone" value="<?php echo $phone; ?>">
                <input type="hidden" id="resort_name" name="resort_name" value="<?php echo $resort_name ?>"><br>
                <input type="hidden" name="child_price" value="<?php echo $price_child ?>">
                <input type="hidden" name="adult_price" value="<?php echo $price_adult ?>">
                <input type="text" hidden name="paid" value="no">
                <input type="submit" class="btn btn-sm btn-secondary" name="payLater" value="Pay Later">
            </form>
        </div>
        <input type="hidden" id="dateBook" value="<?php echo ($date_book); ?>">
        <?php
        ?>
        <!-- <input type="hidden" value="<?php echo ($total); ?>" id="data-amount">
        <input type="hidden" value="<?php echo ($resort); ?>" id="data-id"> -->

        <!-- <button type="button" data-id="<?php //echo ($resort); ?>" data-amount="<?php //echo ($total); ?>" id="buy_now">Pay Now</button> -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            $('body').on('click', '.buy_now', function(e) {

                var totalAmount = <?php echo ($total_price); ?>;
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
                    "phone":9082527187,
                    "handler": function(response) {

                        console.log(response);
                        $.ajax({
                            url: 'processing',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                razorpay_payment_id:  encrypt(response.razorpay_payment_id),
                                total_Amount: encrypt(totalAmount),
                                Product_id: encrypt(product_id),
                                email: encrypt(email_id),
                                dateOfBook: encrypt(date_of_book),
                                customer_name: name,
                                phone: phone,
                                child: child,
                                adult: adult,
                                resort_name: resort_name
                            },
                            success: function(msg) {

                                if (msg.success == "1") {

                                    window.location.href = 'thank-you';
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