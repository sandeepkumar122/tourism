<?php
include '../conn.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(isset($_GET['booking_id']) && strlen($_GET['booking_id'])>1 && isset($_GET['action']) && strlen($_GET['action'])>0){
    $booking_id=pg_escape_string($_GET['booking_id']);
  
    $action=pg_escape_string($_GET['action']);
    if($action==-1){
        $update_query="update paid_booking set status=-1,canceled=true where booking_id='$booking_id'";
        $get_park_query = pg_query($connect, $update_query); 
        if($get_park_query){
            $url="./reports";
            echo "<script LANGUAGE='JavaScript'>alert('Booking Has Been Cancelled!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
}
if(isset($_POST['username']) && strlen($_POST['username'])>0 && isset($_POST['password']) && $_POST['password']){
    $username=pg_escape_string($_POST['username']);
    $password=pg_escape_string($_POST['password']);
 
    $find_query="select * from parks where park_email='$username'";
    $db_query=pg_query($connect,$find_query);
    if(pg_num_rows($db_query)<1){
        $url = './login';
        echo "<script LANGUAGE='JavaScript'>alert('User Does Not Exist!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
    $get_data=pg_fetch_assoc($db_query);
    $dbpassword=$get_data['password'];
    $salt=$get_data['salt'];

    if($dbpassword == sha1(md5($password) . $salt)){
        $_SESSION['email']=$get_data['park_email'];
        $_SESSION['park_logged_in']=true;
        $_SESSION['park_name']=$get_data['park_name'];
        $_SESSION['park_id']=$get_data['id'];
        header('Location:./dashboard');
    }else{
        $url = './login';
        echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
    
}


// for adult price insert and update
if(isset($_POST['Monday']) && strlen($_POST['Monday'])>0 && isset($_POST['Sunday']) && $_POST['Sunday'] && isset($_POST['adult'])){
   
    $park_logged=pg_escape_string($_SESSION['park_logged_in']);
    $monday=pg_escape_string($_POST['Monday']);
    $tuesday=pg_escape_string($_POST['Tuesday']);
    $wednesday=pg_escape_string($_POST['Wednesday']);
    $thursday=pg_escape_string($_POST['Thursday']);
    $friday=pg_escape_string($_POST['Friday']);
    $saturday=pg_escape_string($_POST['Saturday']);
    $sunday=pg_escape_string($_POST['Sunday']);
    $park_id=pg_escape_string($_SESSION['park_id']);

    if(strlen($park_id)>0 && $park_logged==true){

    $select="select * from prices_adult where park_id=$park_id";
    $db_query_select=pg_query($connect,$select);
    if(pg_num_rows($db_query_select)>0){
        $update="update prices_adult set monday=$monday,tuesday=$tuesday,wednesday=$wednesday,thursday=$thursday,friday=$friday,saturday=$saturday,sunday=$sunday";
        $db_query_update=pg_query($connect,$update);
        if($db_query_update){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
        $insert="insert into prices_adult(park_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday) values($park_id,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday)";
        $db_query_insert=pg_query($connect,$insert);
        if($db_query_insert){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
    }
  
  
}

// for child price insert and update
if(isset($_POST['Monday']) && strlen($_POST['Monday'])>0 && isset($_POST['Sunday']) && $_POST['Sunday'] && isset($_POST['child'])){
   
    $park_logged=pg_escape_string($_SESSION['park_logged_in']);
    $monday=pg_escape_string($_POST['Monday']);
    $tuesday=pg_escape_string($_POST['Tuesday']);
    $wednesday=pg_escape_string($_POST['Wednesday']);
    $thursday=pg_escape_string($_POST['Thursday']);
    $friday=pg_escape_string($_POST['Friday']);
    $saturday=pg_escape_string($_POST['Saturday']);
    $sunday=pg_escape_string($_POST['Sunday']);
    $park_id=pg_escape_string($_SESSION['park_id']);

    if(strlen($park_id)>0 && $park_logged==true){

    $select="select * from prices_child where park_id=$park_id";
    $db_query_select=pg_query($connect,$select);
    if(pg_num_rows($db_query_select)>0){
        $update="update prices_child set monday=$monday,tuesday=$tuesday,wednesday=$wednesday,thursday=$thursday,friday=$friday,saturday=$saturday,sunday=$sunday";
        $db_query_update=pg_query($connect,$update);
        if($db_query_update){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
        $insert="insert into prices_child(park_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday) values($park_id,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday)";
        $db_query_insert=pg_query($connect,$insert);
        if($db_query_insert){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
    }
  
  
}

// for group adult price update and insert
if(isset($_POST['Monday']) && strlen($_POST['Monday'])>0 && isset($_POST['Sunday']) && $_POST['Sunday'] && isset($_POST['group-adult'])){
   
    $park_logged=pg_escape_string($_SESSION['park_logged_in']);
    $monday=pg_escape_string($_POST['Monday']);
    $tuesday=pg_escape_string($_POST['Tuesday']);
    $wednesday=pg_escape_string($_POST['Wednesday']);
    $thursday=pg_escape_string($_POST['Thursday']);
    $friday=pg_escape_string($_POST['Friday']);
    $saturday=pg_escape_string($_POST['Saturday']);
    $sunday=pg_escape_string($_POST['Sunday']);
    $park_id=pg_escape_string($_SESSION['park_id']);

    if(strlen($park_id)>0 && $park_logged==true){

    $select="select * from prices_group_adult where park_id=$park_id";
    $db_query_select=pg_query($connect,$select);
    if(pg_num_rows($db_query_select)>0){
        $update="update prices_group_adult set monday=$monday,tuesday=$tuesday,wednesday=$wednesday,thursday=$thursday,friday=$friday,saturday=$saturday,sunday=$sunday";
        $db_query_update=pg_query($connect,$update);
        if($db_query_update){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
        $insert="insert into prices_group_adult(park_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday) values($park_id,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday)";
        $db_query_insert=pg_query($connect,$insert);
        if($db_query_insert){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
    }
  
  
}

// for group child price update and insert
if(isset($_POST['Monday']) && strlen($_POST['Monday'])>0 && isset($_POST['Sunday']) && $_POST['Sunday'] && isset($_POST['group-child'])){
   
    $park_logged=pg_escape_string($_SESSION['park_logged_in']);
    $monday=pg_escape_string($_POST['Monday']);
    $tuesday=pg_escape_string($_POST['Tuesday']);
    $wednesday=pg_escape_string($_POST['Wednesday']);
    $thursday=pg_escape_string($_POST['Thursday']);
    $friday=pg_escape_string($_POST['Friday']);
    $saturday=pg_escape_string($_POST['Saturday']);
    $sunday=pg_escape_string($_POST['Sunday']);
    $park_id=pg_escape_string($_SESSION['park_id']);

    if(strlen($park_id)>0 && $park_logged==true){

    $select="select * from prices_group_child where park_id=$park_id";
    $db_query_select=pg_query($connect,$select);
    if(pg_num_rows($db_query_select)>0){
        $update="update prices_group_child set monday=$monday,tuesday=$tuesday,wednesday=$wednesday,thursday=$thursday,friday=$friday,saturday=$saturday,sunday=$sunday";
        $db_query_update=pg_query($connect,$update);
        if($db_query_update){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
        $insert="insert into prices_group_child(park_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday) values($park_id,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday)";
        $db_query_insert=pg_query($connect,$insert);
        if($db_query_insert){
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Prices Updated Successfully..'); window.location.href= '" . $url . "'; </script>";
            exit();
        }else{
            $url = './update-price';
            echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
    }
  
  
}

