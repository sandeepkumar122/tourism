<?php

if(!isset($_SESSION['email']) && strlen($_SESSION['email'])<1 && !isset($_SESSION['park_logged_in']) && !$_SESSION['park_logged_in']==true){
    $url = './login.php';
    echo "<script LANGUAGE='JavaScript'>alert('Please Login first!!!'); window.location.href= '" . $url . "'; </script>";
    exit();
}

include './headers.php';
// print_r($_SESSION);
$park_id = pg_escape_string($_SESSION['park_id']);
$select = "select * from prices_adult where park_id=$park_id";
$db_query_select = pg_query($connect, $select);
if (pg_num_rows($db_query_select) > 0) {
    $db_Select = pg_fetch_assoc($db_query_select);
}
$select_child = "select * from prices_child where park_id=$park_id";
$db_query_select = pg_query($connect, $select_child);
if (pg_num_rows($db_query_select) > 0) {
    $db_Select_child = pg_fetch_assoc($db_query_select);
}
$select_group_adult = "select * from prices_group_adult where park_id=$park_id";
$db_query_select = pg_query($connect, $select_group_adult);
if (pg_num_rows($db_query_select) > 0) {
    $db_group_adult = pg_fetch_assoc($db_query_select);
}
$select_group_child = "select * from prices_group_child where park_id=$park_id";
$db_query_select = pg_query($connect, $select_group_child);
if (pg_num_rows($db_query_select) > 0) {
    $db_group_child = pg_fetch_assoc($db_query_select);
} 

?>

<html>

<head>
    <link rel="stylesheet" href="../css/price.css">
</head>

<body>
    <!-- for adult -->
    <div class="left-part">
        <h1>Adult</h1>
        <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p>
        <h2>Prices On Different Days For Adult</h2>
        <form action="./main.php" method="post">
            <table id="customers">
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
                <tr>
                    <td>₹ <input type="number" name="Monday" value="<?php echo $db_Select['monday']  ?>"></td>
                    <td>₹ <input type="number" name="Tuesday" value="<?php echo $db_Select['tuesday']  ?>"></td>
                    <td>₹ <input type="number" name="Wednesday" value="<?php echo $db_Select['wednesday']  ?>"></td>
                    <td>₹ <input type="number" name="Thursday" value="<?php echo $db_Select['thursday']  ?>"></td>
                    <td>₹ <input type="number" name="Friday" value="<?php echo $db_Select['friday']  ?>"></td>
                    <td>₹ <input type="number" name="Saturday" value="<?php echo $db_Select['saturday']  ?>"></td>
                    <td>₹ <input type="number" name="Sunday" value="<?php echo $db_Select['sunday']  ?>"></td>
                </tr>
            </table>
            <input type="submit" name="adult">
        </form>

       
    </div>

    <!-- for group-adult -->
    <div class="left-part">
        <h1>Group Adult</h1>
        <!-- <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p> -->
        <!-- <h2>Prices On Different Days For Group Adult</h2> -->
        <form action="./main.php" method="post">
            <table id="customers">
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
                <tr>
                    <td>₹ <input type="number" name="Monday" value="<?php echo $db_group_adult['monday']  ?>"></td>
                    <td>₹ <input type="number" name="Tuesday" value="<?php echo $db_group_adult['tuesday']  ?>"></td>
                    <td>₹ <input type="number" name="Wednesday" value="<?php echo $db_group_adult['wednesday']  ?>"></td>
                    <td>₹ <input type="number" name="Thursday" value="<?php echo $db_group_adult['thursday']  ?>"></td>
                    <td>₹ <input type="number" name="Friday" value="<?php echo $db_group_adult['friday']  ?>"></td>
                    <td>₹ <input type="number" name="Saturday" value="<?php echo $db_group_adult['saturday']  ?>"></td>
                    <td>₹ <input type="number" name="Sunday" value="<?php echo $db_group_adult['sunday']  ?>"></td>
                </tr>
            </table>
            <input type="submit" name="group-adult">
        </form>
    </div>

    <!-- for child -->
    <div class="left-part">
        <h1>Child</h1>
        <!-- <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p> -->
        <!-- <h2>Prices On Different Days For Child</h2> -->
        <form action="./main.php" method="post">
            <table id="customers">
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
                <tr>
                    <td>₹ <input type="number" name="Monday" value="<?php echo $db_Select_child['monday']  ?>"></td>
                    <td>₹ <input type="number" name="Tuesday" value="<?php echo $db_Select_child['tuesday']  ?>"></td>
                    <td>₹ <input type="number" name="Wednesday" value="<?php echo $db_Select_child['wednesday']  ?>"></td>
                    <td>₹ <input type="number" name="Thursday" value="<?php echo $db_Select_child['thursday']  ?>"></td>
                    <td>₹ <input type="number" name="Friday" value="<?php echo $db_Select_child['friday']  ?>"></td>
                    <td>₹ <input type="number" name="Saturday" value="<?php echo $db_Select_child['saturday']  ?>"></td>
                    <td>₹ <input type="number" name="Sunday" value="<?php echo $db_Select_child['sunday']  ?>"></td>
                </tr>
            </table>
            <input type="submit" name="child">
        </form>
    </div>

    <!-- for group child -->
    <div class="left-part">
        <h1>Group Child</h1>
        <!-- <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p> -->
        <!-- <h2>Prices On Different Days For Child</h2> -->
        <form action="./main.php" method="post">
            <table id="customers">
                <tr>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
                <tr>
                    <td>₹ <input type="number" name="Monday" value="<?php echo $db_group_child['monday']  ?>"></td>
                    <td>₹ <input type="number" name="Tuesday" value="<?php echo $db_group_child['tuesday']  ?>"></td>
                    <td>₹ <input type="number" name="Wednesday" value="<?php echo $db_group_child['wednesday']  ?>"></td>
                    <td>₹ <input type="number" name="Thursday" value="<?php echo $db_group_child['thursday']  ?>"></td>
                    <td>₹ <input type="number" name="Friday" value="<?php echo $db_group_child['friday']  ?>"></td>
                    <td>₹ <input type="number" name="Saturday" value="<?php echo $db_group_child['saturday']  ?>"></td>
                    <td>₹ <input type="number" name="Sunday" value="<?php echo $db_group_child['sunday']  ?>"></td>
                </tr>
            </table>
            <input type="submit" name="group-child">
        </form>
    </div>
</body>

</html>