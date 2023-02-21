<html>
    <head>
    <link rel="stylesheet" href="../asset/css/style.css">
 
    <link rel="stylesheet" href="../asset/css/boostrap.min.css">
    <script src="../asset/js/min.js"></script>  
    <script src="../asset/js/tr.js"></script>
    
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


</head>
    <body>
   <?php 
   include '../conn.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // print_r($_SESSION);
   ?>
        <div class="header12" style="margin-bottom:10px ;">
            <a href="./dashboard" class="logo">CompanyLogo</a>
            <div class="header-right">
            <?php if(isset($_SESSION['admin_logged_in']) && isset($_SESSION['admin_email'])){ ?>
              <a href="#userdata">Hello <?php echo $_SESSION['admin_email']; ?>!!!</a>
              <a href="./logout">Logout</a>
            <?php }else{ ?>
              <a href="./admin-login">Login</a>
        <?php    } ?>
        </div>
          </div>
    </body>
</html>
