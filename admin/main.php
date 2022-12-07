<?php
include '../conn.php';
if($_GET['booking_id'] && strlen($_GET['booking_id']) && $_GET['action'] && strlen($_GET['action'])){
    $booking_id=$_GET['booking_id'];
    $action=$_GET['action'];
    if($action==-2){
        $update_query="update paid_booking set status=-2,canceled=true where booking_id='$booking_id'";
        $get_park_query = pg_query($connect, $update_query); 
        if($get_park_query){
            $url="./view-booking.php";
            echo "<script LANGUAGE='JavaScript'>alert('Booking Has Been Cancelled!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
}

?>