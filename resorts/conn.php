<?php

// date_default_timezone_set("Asia/Calcutta");
// $currentDate = date('Y-m-d H:i:s');
/* $dbname = "internship_nats";
$dbservername = "aictehelpdb.mysql.database.azure.com";
$dbusername = "aictehelpadmin@aictehelpdb";
$dbpassword = "zaq!2wsxcde3"; */

//  $dbname = "nats_updated";
// $dbservername = "localhost";
// $dbusername = "root";
// $dbpassword = ""; 

// $dbname = "tourism";
// $dbservername = "localhost";
// $dbusername = "root";
// $dbpassword = ""; 



// $dbname = "nats_updated";
// $dbservername = "192.168.50.42";
// $dbusername = "nat_dev";
// $dbpassword = "toor";


//Connection
// $connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// $conn1 = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);

// if (mysqli_connect_error()) {
//     /*   echo mysqli_error($conn); */
//     echo "Error";
//     exit();
// }

$connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");