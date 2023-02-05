
<?php  
  if(!isset($_SESSION));
  { 
      session_start(); 
  } 
  include '../conn.php';
if (isset($_SESSION['email']) && strlen($_SESSION['email']) > 1 && isset($_SESSION['park_logged_in']) && $_SESSION['park_logged_in'] == true) { 
    echo "<pre>";
    // var_dump($gettype($_POST['confirm']));
    // echo "hello";
    if($_POST['name'] && $_POST['confirm']==1){
        $booking_id=pg_escape_string($_POST['name']);
          $update_query="update paid_booking set status=3 where booking_id='$booking_id'";
        $get_park_query = pg_query($connect, $update_query); 
        if($get_park_query){
            echo "done";
        }
    }
    if($_POST['name'] && $_POST['confirm']==2){
        $booking_id=pg_escape_string($_POST['name']);
        echo  $update_query="update paid_booking set status=1 where booking_id='$booking_id'";
        $get_park_query = pg_query($connect, $update_query); 
        if($get_park_query){
            echo "done canceled";
        }
        
    }
}

?>