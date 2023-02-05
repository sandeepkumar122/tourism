<?php
include './headers.php';
if (!isset($_SESSION)) {
    session_start();
  }
// echo "<pre>";
// print_r($_SESSION);
if(!isset($_SESSION['email']) && strlen($_SESSION['email'])<1 && !isset($_SESSION['park_logged_in']) && !$_SESSION['park_logged_in']==true){
    $url = './login.php';
    echo "<script LANGUAGE='JavaScript'>alert('Please Login first!!!'); window.location.href= '" . $url . "'; </script>";
    exit();
}
$today = date("Y-m-d");


$park_id=$_SESSION['park_id'];
 $select_user="select count(*) as total from paid_booking where resort_id=$park_id";
 $select_user_data = pg_query($connect, $select_user);
$user_data=pg_fetch_assoc($select_user_data);

$select_book="select count(*) as total from paid_booking where status=1 and date_of_book = '$today' and resort_id=$park_id";
$select_book_data = pg_query($connect, $select_book);
$book_data_today=pg_fetch_assoc($select_book_data);

$select_park="select count(*) as total from parks";
$select_park_data = pg_query($connect, $select_park);
$park_data=pg_fetch_assoc($select_park_data);

?>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse visible-xs mainHeader">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <!-- <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Age</a></li>
                    <li><a href="#">Gender</a></li>
                    <li><a href="#">Geo</a></li>
                </ul>
            </div> -->
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Logo</h2>
                <!-- <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Dashboard</a></li>
                    <li><a href="#section2">Age</a></li>
                    <li><a href="#section3">Gender</a></li>
                    <li><a href="#section3">Geo</a></li>
                </ul><br> -->
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4>Dashboard</h4>
                    <!-- <p>Some text..</p> -->
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Total Today Booking Through Our Platform</h4>
                            <p>1 Million</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Total Booking</h4>
                            <p> <?php echo $user_data['total'] ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Today Booking</h4>
                            <p><?php echo $book_data_today['total'] ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Month Booking</h4>
                            <p>30%</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <p><a href="./reports.php">View Today Booking</a></p>
                            <p><a href="./update-price.php">Update Prices</a></p>
                            <!-- <p><a href="./view-resorts.php">View Resorts Info</a></p> -->
                        </div>
                    </div>
                    <!-- <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                            <p>Text</p>
                            <p>Text</p>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                            <p>Text</p>
                            <p>Text</p>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row">
                    <div class="col-sm-8">
                        <div class="well">
                            <p>Text</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>