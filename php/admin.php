<?php
require("./header.php");
?>
<html>
    <head>admin panel</head><br>
    <a href="booking.php">Check All Bookings</a>
    <body>
    <h1>Add new Park</h1>

    <h1>update park</h1>
    <form method="post" action="update.php">
        <input type="text" name="update_park">
        <input type="submit">
    <form>

    <h1>delete park</h1>
    <form method="post" action="update.php">
        <input type="text" name="delete_park">
        <input type="submit">
    <form>
        <h1>water parks</h1>
        <?php
            $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
            $query="select * from park";
            $pg_query=pg_query($connect,$query);
            $result=pg_fetch_all($pg_query);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADULT PRICE</th>
                    <th>CHILD PRICE</th>
                </tr>
            <?php
            for($i=0;$i<count($result);$i++){ 
            ?>
                <tr>
                <td><?php print_r($result[$i]['id']); ?></td>
                <td><?php print_r($result[$i]['name']); ?></td>
                <td><?php print_r($result[$i]['child_price']); ?></td>
                <td><?php print_r($result[$i]['adult_price']); ?></td>
                </tr>
            <?php
            }
            ?>
            </table>


            <h1>theme parks</h1>
        <?php
            $query1="select * from park_theme";
            $pg_query=pg_query($connect,$query1);
            $result=pg_fetch_all($pg_query);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADULT PRICE</th>
                    <th>CHILD PRICE</th>
                </tr>
            <?php
            for($i=0;$i<count($result);$i++){ 
            ?>
                 <tr>
                <td><?php print_r($result[$i]['id']); ?></th>
                <td><?php print_r($result[$i]['name']); ?></th>
                <td><?php print_r($result[$i]['child_price']); ?></th>
                <td><?php print_r($result[$i]['adult_price']); ?></th>
                </tr>
           <?php
            }
            ?>
            </table>

            <h1>educational</h1>
        <?php
            $query="select * from educational";
            $pg_query1=pg_query($connect,$query1);
            $result=pg_fetch_all($pg_query);
        ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ADULT PRICE</th>
                    <th>CHILD PRICE</th>
                </tr>
            <?php
            for($i=0;$i<count($result);$i++){ 
                ?>
                 <tr>
                <td><?php print_r($result[$i]['id']); ?></th>
                <td><?php print_r($result[$i]['name']); ?></th>
                <td><?php print_r($result[$i]['child_price']); ?></th>
                <td><?php print_r($result[$i]['adult_price']); ?></th>
                </tr>
                <?php
            }
            ?>
            </table>
    </body>
</html>

<style>
td,th{
    height:20px;
    width:100px;
    border:1px solid black;
   
}
</style>