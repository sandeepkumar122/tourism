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
    include './functions/encyptDecrypt.php';
    include './conn.php';
    $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
   ?>

        <div class="header12">
            <a href="./index" class="logo">CompanyLogo</a>
            <div class="header-right">
            <?php if(isset($_SESSION['logged_in']) && isset($_SESSION['email'])){ ?>
              <a href="#userdata">Hello <?php echo $_SESSION['name']; ?>!!!</a>
              <a href="./resorts/history">History</a>
              <a href="./logout">Logout</a>
              
            <?php }else{ ?>
              <a href="./login">Login</a>
              <a href="./register">Register</a>
        <?php    } ?>
        </div>
          </div>
    </body>
</html>
