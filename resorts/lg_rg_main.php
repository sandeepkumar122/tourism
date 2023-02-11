<?php
// include './conn.php';
include '../functions/encyptDecrypt.php';
session_start();
$connect = pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
if (isset($_POST['login'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretKey = '6LfqasQhAAAAANNQOG2Oz4KzwSrQXoxOr-SAsb-_';

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if ($responseData->success) {
            $email = pg_escape_string($_POST['uname']);
            $password = pg_escape_string($_POST['password']);
            // print_r($_POST);die;
            $query_for_uname = "select full_name,email,salt,password,phone from user_data where email='$email'";
            $pg_query_uname = pg_query($connect, $query_for_uname);
            if (pg_num_rows($pg_query_uname) > 0) {
                $result_uname = pg_fetch_row($pg_query_uname);
                // echo "<pre>";
                // print_r($result_uname);
                // die;
                $full_name = $result_uname[0];
                $uname = $result_uname[1];
                $salt = $result_uname[2];
                $dbpassword = $result_uname[3];
                $phone = $result_uname[4];

                if ($email == $uname && $dbpassword == sha1(md5($password) . $salt)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['logged_in'] = 1;
                    $_SESSION['name'] = $full_name;
                    $_SESSION['phone'] = $phone;
                    header('Location: ../index.php');
                } else {
                    $url = '../login.php';
                    echo "<script LANGUAGE='JavaScript'>alert('Incorrect Password please check password!!'); window.location.href= '" . $url . "'; </script>";
                    exit();
                }
            } else {
                $url = '../login.php';
                echo "<script LANGUAGE='JavaScript'>alert('User Not Exit please check email!!'); window.location.href= '" . $url . "'; </script>";
                exit();
            }
        }
    }
}

if (isset($_POST['register'])) {

    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretKey = '6LfqasQhAAAAANNQOG2Oz4KzwSrQXoxOr-SAsb-_';

        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if ($responseData->success) {
            $name = pg_escape_string($_POST['full_name']);
            $phone = pg_escape_string($_POST['phone_num']);
            $email = pg_escape_string($_POST['email']);
            // $password = pg_escape_string($_POST['password']);
            $password = pg_escape_string($_POST['pwd']);
            if (strlen($name) > 0 && strlen($phone) > 0 && strlen($email) > 0 && strlen($password) > 0) {
                $password=decryption($password);
                $password = md5($password);
                $salt = sha1(uniqid());
                $password = sha1($password . $salt);
                $query_for_select = "select * from user_data where email='$email'";
                $pg_query_select = pg_query($connect, $query_for_select);
                if (pg_num_rows($pg_query_select) > 0) {
                    $url = '../register.php';
                    echo "<script LANGUAGE='JavaScript'>alert('Email Alredy exist'); window.location.href= '" . $url . "'; </script>";
                    exit();
                }
                $client_ip=get_client_ip();
                $query_for_register = "insert into user_data(full_name,email,phone,salt,password,client_ip) values ('$name','$email','$phone','$salt','$password','$client_ip')  RETURNING id";
                $pg_query_uname = pg_query($connect, $query_for_register);
                $user_data=pg_fetch_all($pg_query_uname);
                $uid=$user_data[0]['id'];
                // echo "<pre>";
                // print_r($uid);
                // $uid=pg_last_oid($pg_query_uname);
                // echo ($uid);
                
                // die;
                $query_for_forget = "insert into forget_password(user_id,email,salt,last_generated) values ('$uid','$email','$salt',NOW())";
                $pg_query_forget = pg_query($connect, $query_for_forget);
               
                $url = '../login.php';
                echo "<script LANGUAGE='JavaScript'>alert('Registration successfull please login through your credentials'); window.location.href= '" . $url . "'; </script>";
            } else {
                $url = "../register.php";
                echo "<script LANGUAGE='JavaScript'>alert('Please Enter full details'); window.location.href= '" . $url . "'; </script>";
                exit();
            }
        } else {
            echo "Invalid Request";
        }
    } else {
        echo "Invalid Request ";
    }
}
