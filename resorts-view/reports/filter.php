<?php
// $park_id=$_SESSION['park_user'];
//  $select = "select * from paid_booking where 1=1 and resort_id=$park_id";
$resort_id=$_SESSION['park_id'];
$select = "select * from paid_booking where resort_id=$resort_id ";
if (!isset($_POST['from_date']) || !isset($_POST['to_date'])) {
    $today = date("Y-m-d");
    $select.=" and date_of_book = '$today'";
}else{
    if(isset($_POST['from_date'])){
        $from_date=pg_escape_string($_POST['from_date']);
        $select.= " and date_of_book>='$from_date'";
    }
    if(isset($_POST['to_date'])){
        $to_date=pg_escape_string($_POST['to_date']);
        $select.=" and date_of_book<='$to_date'";
    }
}

?>