<?php
// include './conn.php';
session_start();
$connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
if(isset($_POST['login'])){
    $email=pg_escape_string($_POST['uname']);
    $password=pg_escape_string($_POST['psw']);

     $query_for_uname="select email,salt,password from user_data where email='$email'"; 
    $pg_query_uname=pg_query($connect,$query_for_uname);
    $result_uname=pg_fetch_row($pg_query_uname);
    // print_r($result_uname);
    echo $uname=$result_uname[0];
    $salt=$result_uname[1];
    $dbpassword=$result_uname[2];
    // while($row=pg_fetch_all($pg_query_uname)){
    // 
    // }
   
    
    if ($email == $uname && $dbpassword == sha1($password . $salt)) {
        $_SESSION['email'] = $email;
        $_SESSION['logged_in'] = 1;
        header('Location: index.php');
    }
  
}

if(isset($_POST['register'])){
    echo "hello";
   echo $email=pg_escape_string($_POST['full_name']);
    $phone=pg_escape_string($_POST['phone_num']);
    $email=pg_escape_string($_POST['email']);
    $password=pg_escape_string($_POST['password']);

    $password = md5($password);
    $salt = sha1(uniqid());
    $password = sha1($password . $salt);

    $query_for_register="insert into user_data(email,phone,salt,password) values ('$email','$phone','$salt','$password')";
    $pg_query_uname=pg_query($connect,$query_for_register);
 
    header('Location: login.php');

    
}

?>