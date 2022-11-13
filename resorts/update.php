<?php
include './conn.php';
if(isset($_POST['update_park']) && strlen($_POST['update_park'])>0 ){
    $id=$_POST['update_park'];
    $query=make_query($id);
    $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
    $pg_query=pg_query($connect,$query);
    $result=pg_fetch_all($pg_query);
    for($i=0;$i<count($result);$i++){

    ?>
    <form method="post" action="">
        <h1><?php print_r($result[$i]['name']); ?></h1>
        <input type="text" name="id" value="<?php echo($id); ?>">
        <input type="text" name="child_price" value="<?php print_r($result[$i]['child_price']); ?>">
        <input type="text" name="adult_price" value="<?php print_r($result[$i]['adult_price']); ?>">
        <input type="submit">
    </form>
<?php
    }
}
else if(isset($_POST['delete_park']) && strlen($_POST['delete_park'])>0 ){
    $id=$_POST['delete_park'];
    $delete_query=delete_query($id);
    $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
    $pg_query=pg_query($connect,$delete_query);
    
}
if(isset($_POST['child_price']) && isset($_POST['adult_price'])){
    $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
    $id=$_POST['id'];
    $child_price=$_POST['child_price'];
    $adult_price=$_POST['adult_price'];
    $update="update park set child_price=$child_price, adult_price=$adult_price where id=$id"
        OR
        "update theme_park set child_price=$child_price, adult_price=$adult_price where id=$id"
        OR
        "update educational set child_price=$child_price, adult_price=$adult_price where id=$id";
    
    echo "$update";
    $pg_query=pg_query($connect,$update);
    echo "successfull";
}

function make_query($id){
    $query="select * from park where id=$id" 
            OR 
            "select * from theme_park where id=$id"
            OR 
            "select * from educational where id=$id";
    return $query;
}
function delete_query($id){
    $delete_query="delete from park where id=$id" 
                    OR 
                    "delete from theme_park where id=$id"
                    OR 
                    "delete from educational where id=$id";
    echo "$delete_query";
    return $delete_query;
}


?>