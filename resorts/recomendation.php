<?php

include './conn.php';
$recomended=$_POST['name'];

$select="select park_name,park_id from parks where park_name Like '%$recomended%'";
$pg_query_select=pg_query($connect,$select);
$name_data=pg_fetch_all($pg_query_select);
if(pg_num_rows($pg_query_select)>0){ ?>
 <option value="">Select</option>
<?php
    for($i=0;$i<count($name_data);$i++){
       
    ?>
<option value="<?php echo $name_data[$i]['park_id'] ?>"><a href="<?php echo $name_data[$i]['park_id'] ?>"><?php echo $name_data[$i]['park_name'] ?></a></option>
<?php }}


?>