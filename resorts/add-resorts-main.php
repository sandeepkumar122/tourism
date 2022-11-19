<?php

if (isset($_POST['park_name']) && $_POST['park_name'] && isset($_POST['add_resort']) && $_POST['add_resort']) {
    $name = pg_escape_string($_POST['park_name']);
    $address = pg_escape_string($_POST['address']);
    $park_contact = pg_escape_string($_POST['park_contact']);
    $park_email = pg_escape_string($_POST['park_email']);
    $adult_price = pg_escape_string($_POST['adult_price']);
    $child_price = pg_escape_string($_POST['child_price']);
    $park_type = pg_escape_string($_POST['park_type']);
    $contact_person_name = pg_escape_string($_POST['contact_person_name']);
    $contact_person_number = pg_escape_string($_POST['contact_person_number']);
    $benifits = pg_escape_string($_POST['benifits']);
    $park_contact = pg_escape_string($_POST['park_contact']);
    $password = pg_escape_string($_POST['password']);
    $password = pg_escape_string($_POST['password']);
  
    if(strlen($name)>0 && strlen($park_contact)>0 && strlen($park_email)>0 && strlen($password)>0){
    $password = md5($password);
    $salt = sha1(uniqid());
    $password = sha1($password . $salt);
  
    if(pg_num_rows($pg_query_select)<1){
        $park_id="PARK".time();
        $ext = strtolower(pathinfo($_FILES["park_image"]["name"], PATHINFO_EXTENSION));
        $targetfolder='../asset/images/';
        $targetfolder_new='../asset/images/';
        if ($_FILES["park_image"]["size"] < 2097152) {
            $file = $park_id . "." . $ext;
            $certificate = $file;
            $targetfolder = $targetfolder . $file;
            $targetfolder_new = $targetfolder_new . $file;
            move_uploaded_file($_FILES['park_image']['tmp_name'], $targetfolder);
        }
        $query_for_register = "insert into park(park_id,park_email,park_name,image,child_price,adult_price,park_contact,park_address,contact_person_name,contact_person_number,park_status,park_approval_status,benifits,salt,password) values ('$park_id','$park_email','$name','$targetfolder_new',$child_price,$adult_price,'$park_contact','$address','$contact_person_name','$contact_person_number',$park_type,1,'$benifits','$salt','$password')";
        $pg_query_uname = pg_query($connect, $query_for_register);
        $url = '../login.php';
        echo "<script LANGUAGE='JavaScript'>alert('Park Added SuccessFully'); window.location.href= '" . $url . "'; </script>";
        }else{
            $url="../register.php";
            echo "<script LANGUAGE='JavaScript'>alert('Please Enter full details'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
  
}
if (isset($_FILES['aadhar_card'])) {
    $refid = $student_uid;
    $targetfolder = "../uploads/student/aadhar/";
    $targetfolder_new = "uploads/student/aadhar/";
    $userfile_name = $_FILES['aadhar_card']['name'];
    $allowed_pdf_mime_extension = array("application/pdf");
    $allowed_pdf = array("pdf");
    $ext = strtolower(pathinfo($_FILES["aadhar_card"]["name"], PATHINFO_EXTENSION));
    $mime_type_student = mime_content_type($_FILES['aadhar_card']['tmp_name']);
    // echo $mime_type_student;die;
    if (in_array($mime_type_student, $allowed_pdf_mime_extension) ) {
        if ($_FILES["aadhar_card"]["size"] < 2097152) {
            $file = $refid . "." . $ext;
            $certificate = $file;
            $targetfolder = $targetfolder . $file;
            $targetfolder_new = $targetfolder_new . $file;
            move_uploaded_file($_FILES['aadhar_card']['tmp_name'], $targetfolder);
        }
    }
}

?>