<?php

include './conn.php';
  // need to work on this functionality
  if(isset($_POST['cancel'])){
    $booking_id= pg_escape_string($_POST['booking_id']);
    if (!isset($_SESSION)) {
        session_start();
      }
   
    if (!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])) {
        header('Location:../login.php');
        exit;
    }

    $booking_id=pg_escape_string($_POST['booking_id']);
    $action=-3;
    if($action==-3){
      echo  $update_query="update paid_booking set status=-3,canceled=true where booking_id='$booking_id'";
        $get_park_query = pg_query($connect, $update_query); 
      // die;
        if($get_park_query){
            $url="./history.php";
            echo "<script LANGUAGE='JavaScript'>alert('Booking Has Been Cancelled!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
 }
?>