<?php
include './headers.php';
if(!isset($_SESSION['admin_logged_in']) && !isset($_SESSION['admin_email'])){
    header('Location:./admin-login');
 }
 $select_user="select count(*) as total from user_data";
 $select_user_data = pg_query($connect, $select_user);
$user_data=pg_fetch_assoc($select_user_data);

$select_book="select count(*) as total from paid_booking where status=1";
$select_book_data = pg_query($connect, $select_book);
$book_data=pg_fetch_assoc($select_book_data);

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
                            <h4>Users</h4>
                            <p><?php echo $user_data['total'];  ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Total Booking</h4>
                            <p><?php echo $book_data['total'];  ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Total Resorts</h4>
                            <p><?php echo $park_data['total'];  ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Booking Growth</h4>
                            <p>30%</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <p><a href="./add-resorts">Add New Resorts</a></p>
                            <p><a href="./view-booking">View Bookings</a></p>
                            <p><a href="./view-resorts">View Resorts</a></p>
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