<html>
    <head>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/css/boostrap.min.css">
    <script src="./asset/js/min.js"></script>  
    <script src="./assets/js/tr.js"></script> 
</head>
    <body>
   <?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
   ?>

        <div class="header12">
            <a href="./index.php" class="logo">CompanyLogo</a>
            <div class="header-right">
            <?php if(isset($_SESSION['logged_in']) && isset($_SESSION['email'])){ ?>
              <a href="#userdata">Hello <?php echo $_SESSION['name']; ?>!!!</a>
              <a href="./resorts/history.php">History</a>
              <a href="./logout.php">Logout</a>
              
            <?php }else{ ?>
              <a href="./login.php">Login</a>
              <a href="./register.php">Register</a>
        <?php    } ?>
        </div>
          </div>
    </body>
</html>
