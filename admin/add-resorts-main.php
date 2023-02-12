<?php
include '../conn.php';

if (isset($_POST['park_name']) && $_POST['address'] && isset($_POST['park_contact']) && isset($_POST['park_email']) && isset($_POST['adult_price']) && isset($_POST['child_price']) && isset($_POST['password']) ) {
   
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
 
  
    if(strlen($name)>0 && strlen($park_contact)>0 && strlen($park_email)>0 && strlen($password)>0){
    $password = md5($password);
    $salt = sha1(uniqid());
    $password = sha1($password . $salt);
    $pg_check="select * from parks where park_email='$park_email'";
    $pg_query_select=pg_query($connect,$pg_check);
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
        $query_for_register = "insert into parks(park_id,park_email,park_name,image,child_price,adult_price,park_contact,park_address,contact_person_name,contact_person_number,park_status,park_approval_status,benifits,salt,password) values ('$park_id','$park_email','$name','$targetfolder_new',$child_price,$adult_price,'$park_contact','$address','$contact_person_name','$contact_person_number',$park_type,1,'$benifits','$salt','$password')";
      
        $pg_query_uname = pg_query($connect, $query_for_register);
       
        $url = './view-resorts';
        echo "<script LANGUAGE='JavaScript'>alert('Park Added SuccessFully.'); window.location.href= '" . $url . "'; </script>";
        exit();
        }else{
            $url="./error";
            echo "<script LANGUAGE='JavaScript'>alert('Something Went Wrong!!'); window.location.href= '" . $url . "'; </script>";
            exit();
        }
    }
  
}


?>