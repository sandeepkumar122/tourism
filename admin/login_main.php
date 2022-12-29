<?php
if(isset($_POST['username']) && strlen($_POST['username'])>0 && isset($_POST['password']) && $_POST['password']){
    $username=pg_escape_string($_POST['username']);
    $password=pg_escape_string($_POST['password']);
 
    $find_query="select * from parks where park_email='$username'";
    $db_query=pg_query($connect,$find_query);
    if(pg_num_rows($db_query)<1){
        $url = './login.php';
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
        header('Location:./dashboard.php');
    }else{
        $url = './login.php';
        echo "<script LANGUAGE='JavaScript'>alert('Invalid Password!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
    
}
?>