<?php
include './headers.php';
require('../conn.php');
if(!isset($_SESSION['admin_logged_in']) && !isset($_SESSION['admin_email'])){
  header('Location:./admin-login');
}
?>
 <head>
    <title>Educational registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css">
  </head>
  <body>
    <div class="main-block d-flex justify-content-center w-75 ">
      <!-- <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Register to our courses</h1>
        <p>W3docs provides free learning materials for programming languages like HTML, CSS, Java Script, PHP etc.</p>
        <div class="btn-group">
          <a class="btn-item" href="https://www.w3docs.com/learn-html.html">Learn HTML</a>
          <a class="btn-item" href="https://www.w3docs.com/quiz/#">Select Quiz</a>
        </div>
      </div> -->
      <form action="./main" method="POST">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register here</h2>
        </div>
        <div class="info">
          <input type="email" name="email" placeholder="Email">
          <input type="password" name="password" placeholder="Password">
          <input type="password" name="confirm_pass" placeholder="Confirm Password">
        </div>
        <div class="checkbox">  
          <!-- <input type="checkbox" name="checkbox"><span>I agree to the <a href="https://www.w3docs.com/privacy-policy">Privacy Poalicy for W3Docs.</a></span> -->
        </div>
        <input type="submit" name="register" class="btn btn-success">
        <!-- <button type="submit" href="/">Submit</button> -->
      </form>
    </div>
  </body>
</html>
