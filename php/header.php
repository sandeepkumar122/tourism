<html>
    <head>
       <!-- <link rel="stylesheet" href="./css/main.css">    -->
       <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
       <!-- <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
</head>
    <body>
   <?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   ?>
        <div class="header12">
            <a href="#default" class="logo">CompanyLogo</a>
            <div class="header-right">
            <?php //if(isset($_SESSION['logged_in']) && isset($_SESSION['email'] )){ ?>
              <a href="../login.php">Login</a>
              <a href="../register.php">Register</a>
            </div>
            <?php //} ?>
          </div>
    </body>
</html>
<style>
    * {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header12 {
  overflow: hidden;
  background-color: #3f1818;
  padding: 20px 10px;
  width: 100%;
}

.header12 a {
  float: left;
  color: #ddd;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header12 a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header12 a:hover {
  background-color: #ddd;
  color: black;
}

.header12 a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header12 a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
  .header12{
      width: 100%;
  }
}
</style>