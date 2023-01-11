<head>
    <script src="../asset/js/tr.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <head>
        <?php
        require("./header.php");

        if (!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])) {
            header('Location: ../login.php');
        }
        $id = $_GET['id'];
        if (isset($id) && strlen($id) > 0) {

            $query = "select * from parks where park_id='$id'";
            $pg_query = pg_query($connect, $query);
            $result = pg_fetch_all($pg_query);
        ?>

            <html>
            <script>
                function checkDay(txt) {
                    const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                    let dat = txt.value;
                    let d = new Date(dat);
                    let day = d.getDay()
                    // console.log(weekday[day]);
                    document.getElementById("selectedDat").innerHTML = weekday[day];
                }
                function checkGroup(txt){
                    let total=txt.value;
                    console.log(total);
                    if(total>40){
                        console.log("from if")
                        // $("#group_p").removeAttr("hidden")
                        $('#group_p').show();
                    }else{
                        console.log("from else")
                        // $("#group_p").attr("hidden")
                        $('#group_p').hide();
                    }
                }
            </script>

    <body>
        <?php

            for ($i = 0; $i < count($result); $i++) {
                $select_for_price = "select * from prices_adult where park_id='" . $result[$i]['id'] . "'";
                $pg_price = pg_query($connect, $select_for_price);
                $result_price = pg_fetch_assoc($pg_price);
                array_shift($result_price);

                $select_for_price_child = "select * from prices_child where park_id='" . $result[$i]['id'] . "'";
                $pg_price_child = pg_query($connect, $select_for_price_child);
                $result_price_child = pg_fetch_assoc($pg_price_child);
                array_shift($result_price_child);


                $select_for_price_group = "select * from prices_group_adult where park_id='" . $result[$i]['id'] . "'";
                $pg_price_group = pg_query($connect, $select_for_price_group);
                $result_price_group = pg_fetch_assoc($pg_price_group);
                array_shift($result_price_group);
                // echo "<pre>";
                // print_r($result_price);
        ?>

            <div class="main-container">
                <div class="sub-container">
                    <!-- <a href="main.php?id=123"> -->
                    <img src=<?php print_r($result[$i]['image']); ?> class="image-11">
                    <!-- </a> -->
                </div>

                <div class="card w-75">
                    <div class="info-11">
                        <h1 style="text-align:center;"><?php print_r($result[$i]['park_name']); ?></h1>

                        <!-- <div class="block-part">
                            <h4>Group Picnic(For Group Picnic Member Must Be Greater Then 20)</h4>
                            <div>
                                <h4>Children Price(Height Less then 3.6 Feet)</h4><br>
                                <del>₹<?php print_r($result[$i]['child_price'] - 100) ?> </del>
                                <h4>₹<?php print_r($result[$i]['child_price']) ?> </h4>

                            </div>
                            <div>
                                <h4>Adult Price(Height more then 3.6 Feet)</h4><br>
                                <h4 id="data-amount">₹<?php print_r($result[$i]['adult_price']) ?> </h4>
                            </div>
                            <h4>Benifits : <?php print_r($result[$i]['benifits']); ?></h4>
                        </div> -->


                    </div>

                </div>
            </div>

            <!-- <div class="booking-part">
                <div class="inside-booking">

                    <form method="post" action="checkout.php">
                        <div>
                            <label>date of booking</label><br>
                            <input type="date" required id="bookingDate" name="bookingDate" class="input-tag"><br>
                        </div>
                        <div>
                            <label>name</label><br>
                            <input type="text" value="<?php echo $_SESSION['name']; ?>" id="name" name="cust_name" required class="input-tag"><br>
                        </div>
                        <div>
                            <label>number of adults</label><br>
                            <input type="number" required id="adult" name="adult" class="input-tag"><br>
                        </div>
                        <div>
                            <label>Child</label><br>
                            <input type="number" id="child" name="child" class="input-tag"><br>
                        </div>
                        <div>
                            <label>Phone Number</label><br>
                            <input type="phone" required id="phone" name="phone" class="input-tag"><br>
                        </div>
                        <div>
                            <label>Email</label><br>
                            <input type="Email" value="<?php echo $_SESSION['email']; ?>" id="email" name="email" required class="input-tag"><br>
                        </div>
                        <input type="hidden" id="resort_id" name="resort_id" value="<?php print_r($result[$i]['id']) ?>"><br>
                        <input type="hidden" id="resort_name" name="resort_name" value="<?php print_r($result[$i]['park_name']) ?>"><br>
                        <input type="hidden" name="child_price" value="<?php print_r($result[$i]['child_price']) ?>">
                        <input type="hidden" name="adult_price" value="<?php print_r($result[$i]['adult_price']) ?>">
                        <input type="submit" class="btn btn-primary buy_now" value="Book Now">
                    </form>

                </div>
            </div> -->
    </body>

    <head>
        <title>Book Now</title>

    </head>

<body>
    <div class="main-block">
        <div class="left-part">

            <h1>Aqua Imagica</h1>
            <p>Benifits:- <?php echo $result[$i]['benifits']; ?></p>
            <h2>Price</h2>
            <table id="customers">
                <tr>
                    <th>Info</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>

                </tr>
                <tr>
                    <td>Adult</td>
                    <td>₹<?php echo $result_price['monday'] ?></td>
                    <td>₹<?php echo $result_price['tuesday'] ?></td>
                    <td>₹<?php echo $result_price['wednesday'] ?></td>
                    <td>₹<?php echo $result_price['thursday'] ?></td>
                    <td>₹<?php echo $result_price['friday'] ?></td>
                    <td>₹<?php echo $result_price['saturday'] ?></td>
                    <td>₹<?php echo $result_price['sunday'] ?></td>
                </tr>
                <!-- <h3>Children Price</h3> -->
                <tr>
                    <td>Child</td>
                    <td>₹<?php echo $result_price_child['monday'] ?></td>
                    <td>₹<?php echo $result_price_child['tuesday'] ?></td>
                    <td>₹<?php echo $result_price_child['wednesday'] ?></td>
                    <td>₹<?php echo $result_price_child['thursday'] ?></td>
                    <td>₹<?php echo $result_price_child['friday'] ?></td>
                    <td>₹<?php echo $result_price_child['saturday'] ?></td>
                    <td>₹<?php echo $result_price_child['sunday'] ?></td>
                </tr>
                <h3>Group Adult Price</h3>
                <tr>
                    <td>Group Adult(Count Must Be Equal to or Greater Then 40)</td>
                    <td>₹<?php echo $result_price_group['monday'] ?></td>
                    <td>₹<?php echo $result_price_group['tuesday'] ?></td>
                    <td>₹<?php echo $result_price_group['wednesday'] ?></td>
                    <td>₹<?php echo $result_price_group['thursday'] ?></td>
                    <td>₹<?php echo $result_price_group['friday'] ?></td>
                    <td>₹<?php echo $result_price_group['saturday'] ?></td>
                    <td>₹<?php echo $result_price_group['sunday'] ?></td>
                </tr>
            </table>
            <div class="btn-group">
                <a class="btn-item" href="https://www.w3docs.com/learn-html.html">Check Address</a>
                <a class="btn-item" href="https://www.w3docs.com/quiz/#">See Photos</a>
            </div>
        </div>
        <form method="post" action="checkout.php">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Book Now</h2>
            </div>
            <div class="info">
                <p id="selectedDat"></p>
                <input type="date" onchange="checkDay(this)" minDate="01/11/2023" placeholder="Booking Date" required id="bookingDate" name="bookingDate" class="input-tag"><br>

                <input type="hidden" value="<?php echo $_SESSION['name']; ?>" id="name" name="cust_name" required class="input-tag">

                <input type="number" onchange="checkGroup(this)" placeholder="Adult Count" required id="adult" name="adult" class="input-tag">

                <input type="number" placeholder="Child Count" id="child" name="child" class="input-tag">
                <div class="checkbox" id="group_p" >
                    <input type="checkbox"  name="group_picnic" id="group_picnic"><span>Is It Group Picnic?</span>
                </div>
                <input type="phone" placeholder="Phone" required id="phone" name="phone" class="input-tag">
                <input type="hidden" id="resort_id" name="resort_id" value="<?php print_r($result[$i]['id']) ?>"><br>
                <input type="hidden" id="resort_name" name="resort_name" value="<?php print_r($result[$i]['park_name']) ?>"><br>
                <input type="hidden" name="child_price" value="<?php print_r($result[$i]['child_price']) ?>">
                <input type="hidden" name="adult_price" value="<?php print_r($result[$i]['adult_price']) ?>">
                <input type="hidden" value="<?php echo $_SESSION['email']; ?>" id="email" name="email" required class="input-tag">
            </div>
            <div class="checkbox">
                <input type="checkbox" name="checkbox"><span>I agree to the <a href="https://www.w3docs.com/privacy-policy">Privacy Poalicy for W3Docs.</a></span>
            </div>
            <button type="submit" href="/">Submit</button>
        </form>
    </div>
</body>
</html>
</html>

<?php
            }
        } else {
            header("Location: ../index.php");
        }
        require("../footer.html");

?>
<script>
    $(function() {
        $('#group_p').hide();
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#bookingDate').attr('min', maxDate);
    });
</script>

<style>
    .card {
        text-align: center;
        width: 100%;
        background-color: blue;
        margin-left: 154px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr {
        background-color: blue !important
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>