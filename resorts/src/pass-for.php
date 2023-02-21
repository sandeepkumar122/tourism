
<?php
include '../../conn.php';
include '../../functions/encyptDecrypt.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['forget-pass'])) {
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretKey = '6LfqasQhAAAAANNQOG2Oz4KzwSrQXoxOr-SAsb-_';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $email = pg_escape_string($_POST['email']);
            $select_query = "select salt from forget_password where email='$email'";
            $pg_select_query = pg_query($connect, $select_query);
            $data = pg_fetch_all($pg_select_query);

            if (pg_num_rows($pg_select_query) > 0) {
                $data = pg_fetch_all($pg_select_query);
                $salt = $data[0]['salt'];
                $update_query = "update forget_password set last_generated=now() where email='$email'";
                $pg_update_query = pg_query($connect, $update_query);

                $url = "../../forget-password";
                echo "<script LANGUAGE='JavaScript'>alert('Forget Password Link is sent to your Email!!'); window.location.href= '" . $url . "'; </script>";
                exit();
            } else {
                $url = "../../forget-password";
                echo "<script LANGUAGE='JavaScript'>alert('User Not Found With Given Email, Please check Your Mail!!'); window.location.href= '" . $url . "'; </script>";
                exit();
            }
        }
    }
}

if (isset($_POST['change-pass'])) {

    $email = $_SESSION['email'];
    $password = pg_escape_string($_POST['pwd']);
    $salt = pg_escape_string($_POST['code']);
    $password = decryption($password);
    $password = md5($password);
    $password = sha1($password . $salt);
    $update_query = "update user_data set password='$password' where email='$email'";
    $pg_update_query = pg_query($connect, $update_query);

    if ($pg_update_query) {
        unset($_SESSION['email']);
        $url = "../../login";
        echo "<script LANGUAGE='JavaScript'>alert('Password Reset Successfull!! Please Login.'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
}
?>