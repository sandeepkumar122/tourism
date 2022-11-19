<?php
require("./header.php");

$connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");

?>
<html>
    <head>admin panel</head><br>
    <a href="booking.php">Check All Bookings</a>
    <body>
    <h1>Add new Park</h1>
    <form action="./add-resorts-main.php" method="POST">
      <div class="container">
          <label><b>Park Name</b></label>
          <input type="text" placeholder="Enter Name" name="park_name" required>

          <label><b>Park Address</b></label>
          <input type="text" placeholder="Enter Address" name="address" required>

          <label><b>Park Image</b></label>
          <input type="file" placeholder="" name="park_image" required>

          <label><b>Park Contact Number  </b></label>
          <input type="text" placeholder="Park Contact Number" name="park_contact" required>

          <label><b>Adult Price</b></label>
          <input type="number" placeholder="Number Of Adult" name="adult_price" required>

          <label><b>Child Price</b></label>
          <input type="number" placeholder="Number Of Child" name="child_price" required>

          <label><b>Contact Person Name </b></label>
          <input type="text" placeholder="Contact Person Name" name="contact_person_name" required>

          <label><b>On Above Price What Benifits Customer Will Get </b></label>
          <input type="text" placeholder="Contact Person Number" name="benifits" required>

          <label><b>Park Email  </b></label>
          <input type="text" placeholder="Enter Email" name="park_email" required>

          <label><b>Password </b></label>
          <input type="password" placeholder="Password" name="password" required>

          <label><b>Confirm Password </b></label>
          <input type="password" placeholder="Confirm Password" id="cnf_password" required>
        
          <label for="park_type">Park Type</label>
          <select name="park_type" id="park_type">
            <option value="">Select</option>
            <option value="1">Water Park</option>
            <option value="2">Theme Park</option>
            <option value="3">Educational Park</option>
          </select>
          <button type="submit" name="add_resort">Add</button>
         
      </div>
    </form>
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