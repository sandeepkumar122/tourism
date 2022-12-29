<?php
include '../conn.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_GET['booking_id']) && strlen($_GET['booking_id']) && isset($_GET['action']) && strlen($_GET['action'])){
    $booking_id=pg_escape_string($_GET['booking_id']);
    $action=pg_escape_string($_GET['action']);
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

if(isset($_POST['email']) && strlen($_POST['email'])>0 && isset($_POST['password']) && strlen($_POST['password']) && isset($_POST['register']) ){
    $password=pg_escape_string($_POST['password']);
    $email=pg_escape_string($_POST['email']);
    $password = md5($password);
    $salt = sha1(uniqid());
    $password = sha1($password . $salt);
    $insert_query="insert into admin(username,password,salt,level_permission) values('$email','$password','$salt',1)";
    $insert_data = pg_query($connect, $insert_query);
    if($insert_data){
        $url="./dashboard.php";
        echo "<script LANGUAGE='JavaScript'>alert('New Admin Added SuccessFully!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }else{
        $url="./dashboard.php";
        echo "<script LANGUAGE='JavaScript'>alert('Something Went Wrong!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
}

if(isset($_POST['username']) && strlen($_POST['username'])>0 && isset($_POST['password']) && strlen($_POST['password']) && isset($_POST['login']) ){
    
    $password=pg_escape_string($_POST['password']);
    $email=pg_escape_string($_POST['username']);
    $select_query="select * from admin where username='$email'";
    $select_query_data = pg_query($connect, $select_query);
    if(pg_num_rows($select_query_data)>0){
        $data=pg_fetch_assoc($select_query_data);
      
        $salt=$data['salt'];
        if($data['password']==sha1(md5($password).$salt)){
            $_SESSION['admin_logged_in']=true;
            $_SESSION['admin_email']=$data['username'];
            $_SESSION['permission']=$data['level_permission'];
            header('Location:./dashboard.php');
        }else{
            $url="./create-admin.php";
            echo "<script LANGUAGE='JavaScript'>alert('Password Does Not Match!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
            $url="./create-admin.php";
            echo "<script LANGUAGE='JavaScript'>alert('User Does Not Exist!!'); window.location.href= '" . $url . "'; </script>";
            exit();
    }
   
}


?>