<?php
require("./headers.php");
if(!isset($_SESSION['admin_logged_in']) && !isset($_SESSION['admin_email'])){
  header('Location:./admin-login.php');
}
include '../conn.php';
?>
<html>
    <body>
    <h1>Add new Park</h1>
    <form action="./add-resorts-main.php" method="POST" enctype="multipart/form-data">
      <div class="container">
          <label><b>Park Name</b></label>
          <input type="text" placeholder="Enter Name" name="park_name" required>

          <label><b>Park Address</b></label><br>
          <input type="text" placeholder="Enter Address" name="address" required><br><br>

          <label><b>Park Image</b></label>
          <input type="file" placeholder="" name="park_image" id="park_image" required><br><br>

          <label><b>Park Contact Number  </b></label>
          <input type="text" placeholder="Park Contact Number" name="park_contact" required>

          <label><b>Adult Price</b></label>
          <input type="number" placeholder="Number Of Adult" name="adult_price" required>

          <label><b>Child Price</b></label>
          <input type="number" placeholder="Number Of Child" name="child_price" required>

          <label><b>Contact Person Name </b></label>
          <input type="text" placeholder="Contact Person Name" name="contact_person_name" required>

          <label><b>Contact Person Number </b></label>
          <input type="text" placeholder="Contact Person Number" name="contact_person_number" required>

          <label><b>On Above Price What Benifits Customer Will Get </b></label>
          <input type="text" placeholder="Contact Person Number" name="benifits" required>

          <label><b>Park Email  </b></label>
          <input type="text" placeholder="Enter Email" name="park_email" required>

          <label><b>Password </b></label>
          <input type="password" placeholder="Password" name="password" required>

          <label><b>Confirm Password </b></label>
          <input type="password" placeholder="Confirm Password" id="cnf_password" required>
        
          <label for="park_type"><b>Park Type</b></label>
          <select name="park_type" id="park_type">
            <option value="">Select</option>
            <option value="1">Water Park</option>
            <option value="2">Theme Park</option>
            <option value="3">Educational Park</option>
          </select> <br>
          <input type="submit" name="add_resort" class="btn btn-success" value="Add">
          <!-- <button type="submit" >Add</button> -->
         
      </div>
    </form>
    
    </body>
</html>

