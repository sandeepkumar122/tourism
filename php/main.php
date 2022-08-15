<head>
  
<head>
<?php
require("./header.php");

if(!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])){
    header('Location: ../register.php');
}



$id=$_GET['id'];
if(isset($id) && strlen($id)>0){

$query="select * from park where id=$id";
$pg_query=pg_query($connect,$query);
$result=pg_fetch_all($pg_query);
if(pg_num_rows($pg_query)<=0){
    $query="select * from park_theme where id=$id";
    $pg_query=pg_query($connect,$query);
    $result=pg_fetch_all($pg_query);
    if(pg_num_rows($pg_query)<=0){
        $query="select * from educational where id=$id";
        $pg_query=pg_query($connect,$query);
        $result=pg_fetch_all($pg_query);
    }
}


$result=pg_fetch_all($pg_query);

?>

<html>
   <body> 
      <?php
    
         for($i=0;$i<count($result);$i++){
      ?>
    <div class="main-container">
        <div class="sub-container">
            <a href="main.php?id=123">
                <img src=<?php print_r($result[$i]['dir']); ?> class="image-11">
            </a>
        </div>
        <div class="info-11">
            <h1 style="text-align:center;"><?php  print_r($result[$i]['name']);?></h1>
            <div class="block-part">
                <h4>Group Picnic(For Group Picnic Member Must Be Greater Then 20)</h4>
                <div >
                    <h4>Children Price(Height Less then 3.6 Feet)</h4><br>
                    <del>₹<?php print_r($result[$i]['child_price']-100) ?> </del>
                    <h4>₹<?php print_r($result[$i]['child_price']) ?> </h4>
                </div>
                <div>
                    <h4>Adult Price(Height more then 3.6 Feet)</h4><br>
                    <h4 id="data-amount">₹<?php print_r($result[$i]['adult_price']) ?> </h4>
                </div>
            </div>
            
          
        </div>
    </div>
    <div class="booking-part">
        <div class="inside-booking">

            <form method="post" action="checkout.php">
                <label>date of booking</label><br>
                <input type="date" id="bookingDate" name="bookingDate" class="input-tag"><br>
                <label>name</label><br>
                <input type="text" value="<?php echo $_SESSION['name']; ?>" id="name" name="cust_name" class="input-tag"><br>
                <label>number of adults</label><br>
                <input type="number" id="adult" name="adult" class="input-tag"><br>
                <label>Child</label><br>
                <input type="number" id="child" name="child" class="input-tag"><br>
                <label>Phone Number</label><br>
                <input type="phone" id="phone" name="phone" class="input-tag"><br>
                <label>Email</label><br>
                <input type="Email" value="<?php echo $_SESSION['email']; ?>" id="email" name="email" class="input-tag"><br>
                <input type="hidden" id="resort_name" name="resort_id" value="<?php print_r($id) ?>"><br>
                <input type="hidden" id="resort_name" name="resort_name" value="<?php print_r($result[$i]['name']) ?>"><br>
                <input type="hidden" name="child_price" value="<?php print_r($result[$i]['child_price'])?>">
                <input type="hidden" name="adult_price" value="<?php print_r($result[$i]['adult_price'])?>">
                <input type="submit" class="btn btn-primary buy_now" value="Book Now">
               				
                
                
            </form>
           
         </div>
    </div>
   </body>
  
</html>

<?php
}
}
require("../footer.html");

?>
