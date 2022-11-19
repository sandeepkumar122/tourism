<?php
// include './conn.php';
session_start();
$connect = pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
if (isset($_POST['login'])) {
    $email = pg_escape_string($_POST['uname']);
    $password = pg_escape_string($_POST['psw']);

     $query_for_uname = "select full_name,email,salt,password from user_data where email='$email'";
    $pg_query_uname = pg_query($connect, $query_for_uname);
    if (pg_num_rows($pg_query_uname) > 0) {
        $result_uname = pg_fetch_row($pg_query_uname);
        
        $full_name = $result_uname[0];
        $uname = $result_uname[1];
        $salt = $result_uname[2];
        $dbpassword = $result_uname[3];

        if ($email == $uname && $dbpassword == sha1(md5($password) . $salt)) {
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = 1;
            $_SESSION['name'] = $full_name;
            header('Location: ../index.php');
        }
        else{
            $url = '../login.php';
            echo "<script LANGUAGE='JavaScript'>alert('Incorrect Password please check password!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }else{
        $url = '../login.php';
        echo "<script LANGUAGE='JavaScript'>alert('User Not Exit please check email!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
}

if (isset($_POST['register'])) {
    $name = pg_escape_string($_POST['full_name']);
    $phone = pg_escape_string($_POST['phone_num']);
    $email = pg_escape_string($_POST['email']);
    $password = pg_escape_string($_POST['password']);
    if(strlen($name)>0 && strlen($phone)>0 && strlen($email)>0 && strlen($password)>0){
    $password = md5($password);
    $salt = sha1(uniqid());
    $password = sha1($password . $salt);
    $query_for_select="select * from user_data where email='$email'";
    $pg_query_select=pg_query($connect,$query_for_select);
  
    if(pg_num_rows($pg_query_select)>0){
        $url = '../register.php';
        echo "<script LANGUAGE='JavaScript'>alert('Email Alredy exist'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
    $query_for_register = "insert into user_data(full_name,email,phone,salt,password) values ('$name','$email','$phone','$salt','$password')";
    $pg_query_uname = pg_query($connect, $query_for_register);
    $url = '../login.php';
    echo "<script LANGUAGE='JavaScript'>alert('Registration successfull please login through your credentials'); window.location.href= '" . $url . "'; </script>";
    }else{
        $url="../register.php";
        echo "<script LANGUAGE='JavaScript'>alert('Please Enter full details'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
}
