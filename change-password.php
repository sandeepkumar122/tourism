<html>

<head>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<?php
include './conn.php';

if (!isset($_SESSION)) {
    session_start();
}
include './header.php';
if (isset($_GET['code'])) {
    $code = pg_escape_string($_GET['code']);

    $select_for_code = "select extract(EPOCH FROM(now()-last_generated)) as second,email from forget_password where salt='$code'";
    $pg_select_for_code = pg_query($connect, $select_for_code);
    if (pg_num_rows($pg_select_for_code) < 1) {
        $url = '../index.php';
        echo "<script LANGUAGE='JavaScript'>window.location.href= '" . $url . "'; </script>";
        exit();
    }
    $data = pg_fetch_all($pg_select_for_code);
    $email = $data[0]['email'];
    $_SESSION['email'] = $email;
    if ($data[0]['second'] < 3600) {
?>
        <form action="./resorts/src/pass-for.php" method="POST">
            <div class="container" <label>Password</label>
                <input type="Password" required id="MainPassword">
                <p><input type="checkbox" id="show_pass_check">Show Password</p>
                <br>
                <label>Confirm Password</label>
                <input type="Password" required id="cpassword" onchange="checkPass(this)" name="password">

                <input type="hidden" name="pwd" id="password">
                <input type="hidden" value="<?php echo $code; ?>" name="code" id="code">
                <button type="submit" id="change-pass" name="change-pass">Submit</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">

                <span class="psw">Forgot <a href="./register.php">password?</a></span>
            </div>
        </form>
<?php  } else {
        $url = '../forget-password.php';
        echo "<script LANGUAGE='JavaScript'>alert('Link Is Expired!!!'); window.location.href= '" . $url . "'; </script>";
        exit();
    }
} else {
    $url = './forget-password.php';
    echo "<script LANGUAGE='JavaScript'>window.location.href= '" . $url . "'; </script>";
    exit();
}

?>

</html>
<script>
    function checkPass(txt) {
        let pass = document.getElementById("MainPassword").value;
        if (pass != txt.value) {
            alert("Password Does Not Match With Confirm Password!!!")
            txt.value = "";
        }
        let hash = encrypt(pass);
        $("#password").val(hash);
    }
</script>