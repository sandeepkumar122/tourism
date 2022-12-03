<?php 
$select="select * from paid_booking where 1";

if(isset($_POST['from_date']) && strlen($_POST['from_date'])>0){
    $select.=" and date_of_book >= '".$_POST['from_date']."'";
}
if(isset($_POST['to_date']) && strlen($_POST['to_date'])>0){
    $select.=" and date_of_book <= '".$_POST['to_date']."'";
}

if(isset($_POST['parks']) && strlen($_POST['parks'])>0){
    $select.=" and park_id = '".$_POST['parks']."'";
}

?>