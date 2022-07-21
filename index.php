<html>
    <head>
        <title>my picnic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="./css/main.css">
       
    </head>
    <body>
        <?php
        require("./header.php");
        ?>
          <div class="main-content" >
              <div class="first">
                <a href="./php/water.php"><img src="./images/water.webp" class="imag"></a>
                <div class="banner-description">
                  <h1>Water Park</h1>
                </div>
              </div>
              <hr>
              <div class="first">
                <a href="./php/theme.php"><img src="./images/theme.webp" class="imag"></a>
                <div class="banner-description">
                  <h1>Theme Park</h1>
                </div>
                
              </div>
              <hr>
              <div class="first">
                <a href="./php/educational.php"><img src="./images/Educational_trip.jpg" class="imag"></a>
                <div class="banner-description">
                  <h1>Education And Adventure</h1>
                </div>

              </div>
              <?php
              if(isset($_SESSION['logged-in']) && $_SESSION['logged-in']){?>
                <div class="first">
                <a href="./php/educational.php"><img src="./images/Educational_trip.jpg" class="imag"></a>
                <div class="banner-description">
                  <h1>History</h1>
                </div>

              </div>
              <?php
              }
              ?>
              
              <hr>
              
          </div>
        <?php require("footer.html"); 
     
        ?>
    </body>
    <style>
        .imag{
            height: 350px;
            width: 950px;
        }
        .first{
            text-align: center;
            margin-top: 30px;
            
        }
        .first a{
          box-shadow: 10px 10px;
        }
      /*.first{
        position: relative;
      }
      .banner-description{
        position: absolute;
        background-color:rgba(255, 0, 0, 0.5);
        bottom: 0px;
        left: 0px;
      }*/
       
      @media only screen and (max-width: 600px) {
      
      }


        #footer{
            margin-top: 20px;
        }
    </style>
</html>