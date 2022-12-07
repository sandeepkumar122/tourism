<head>
  <script src="../asset/js/tr.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<head>
<?php
require("./header.php");

if(!isset($_SESSION['email']) && !isset($_SESSION['logged_in'])){
    header('Location: ../login.php');
}


$id=$_GET['id'];
if(isset($id) && strlen($id)>0){

$query="select * from parks where park_id='$id'";
$pg_query=pg_query($connect,$query);
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
                <img src=<?php print_r($result[$i]['image']); ?> class="image-11">
            </a>
        </div>
        <div class="card" style="text-align:center;width:100%">
        <div class="info-11" >
            <h1 style="text-align:center;"><?php  print_r($result[$i]['park_name']);?></h1>
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
                <h4>Benifits : <?php print_r($result[$i]['benifits']); ?></h4>
            </div>

            </div>
            
            </div>
        </div>
   
    <div class="booking-part">
        <div class="inside-booking">

            <form method="post" action="checkout.php">
                <div>
                <label>date of booking</label><br>
                <input type="date" required id="bookingDate" name="bookingDate"  class="input-tag"><br>
                </div>
                <div>
                <label>name</label><br>
                <input type="text" value="<?php echo $_SESSION['name']; ?>" id="name" name="cust_name" required class="input-tag"><br>
                </div>
                <div>
                <label>number of adults</label><br>
                <input type="number" required id="adult" name="adult" class="input-tag"><br>
                </div>
                <div>
                <label>Child</label><br>
                <input type="number"  id="child" name="child" class="input-tag"><br>
                </div>
                <div>
                <label>Phone Number</label><br>
                <input type="phone" required id="phone" name="phone" class="input-tag"><br>
                </div>
                <div>
                <label>Email</label><br>
                <input type="Email" value="<?php echo $_SESSION['email']; ?>" id="email" name="email" required class="input-tag"><br>
                </div>
                <input type="hidden" id="resort_id" name="resort_id" value="<?php print_r($result[$i]['id']) ?>"><br>
                <input type="hidden" id="resort_name" name="resort_name" value="<?php print_r($result[$i]['park_name']) ?>"><br>
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
}else{
    header("Location: ../index.php");
}
require("../footer.html");

?>
<script>
//     $( document ).ready(function() {
//         var today = new Date();
//         $('#bookingDate').attr("min",today);
// });
$(document).ready(function () {
  function getISODate() {
    var d = new Date();
    return d.getFullYear() + '-' +
      ( + d.getMonth()) + '-' +
      ( + d.getDate());
  }
  $('#bookingDate').prop('min', getISODate());

  function bookingDateFunc(){
    alert("working")
    // var today=new Date();
    // var enterDate=txt.val();
    // if(enterDate<today){
    //     alert("Date cannot be less then today");
    //     $("#bookingDate").val="";
    // }
}

});



</script>
