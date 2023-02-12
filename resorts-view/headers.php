<html>
    <head>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/boostrap.min.css">
    <script src="../asset/js/min.js"></script>  
    <script src="../asset/js/tr.js"></script>
</head>
    <body>
   <?php 
   include '../conn.php';
    if(!isset($_SESSION));
    { 
        session_start(); 
    } 
   ?>
        <div class="header12">
            <a href="./dashboard" class="logo">CompanyLogo</a>
            <div class="header-right">
            <?php if(isset($_SESSION['park_logged_in']) && $_SESSION['park_logged_in']==true && isset($_SESSION['email'])){ ?>
              <a href="#">Hello <?php echo $_SESSION['park_name']; ?>!!!</a>
              <a href="./dashboard">Dashboard</a>
              <a href="./logout">Logout</a>
           
            <?php }else{ ?>
              <a href="./login">Login</a>
              <!-- <a href="./register.php">Register</a> -->
        <?php    } ?>
        </div>
          </div>
    </body>
</html>
