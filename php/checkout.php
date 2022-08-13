<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>     
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<head>

<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("../header.php");
$name=$_POST['cust_name'];
$adult=$_POST['adult'];
$child=$_POST['child'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$resort=$_POST['resort_id'];
$resort_name=$_POST['resort_name'];
// $date_of_book=date('Y-m-d',$_POST['bookingDate']);
$today_date=date("Y-m-d");
$child_price=$_POST['child_price'];
$adult_price=$_POST['adult_price'];
$total=$child_price*$child+$adult_price*$adult;
$date_book=$_POST['bookingDate'];
print_r($_POST);
// if(strlen($date_book)>0 && ($adult>0 || $child>0) && (strlen($phone)>0) && ( strlen($email)) && ( strlen($resort)>0) && ($date_book>=$today_date)){
?>
<div>
<h1>Please Confirm</h1>
<h3>Name: <?php print_r($_POST['cust_name']); ?> </h3>
<h3>Park Name: <?php print_r($_POST['resort_name']); ?><h3>
<h3>Number Of Children: <?php print_r($_POST['child']); ?> </h3>
<h3>Number Of Adult: <?php print_r($_POST['adult']); ?> </h3>
<h3>Email: <?php print_r($_POST['email']); ?> </h3>
<h3>Amount: <?php echo($total); ?> </h3>
<h3>Date Of Booking: <?php print_r($_POST['bookingDate']); ?> </h3>
<h3>Phone: <?php print_r($_POST['phone']); ?> </h3>
</div>
<input type="hidden" id="dateBook" value="<?php echo($date_book);?>">
<?php
 ?>
    <input type="hidden" value="<?php echo($total); ?>" id="data-amount">
    <input type="hidden" value="<?php echo($resort); ?>" id="data-id">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary buy_now">Pay Now</a> 

    <button type="button" data-id="<?php echo($resort); ?>" data-amount="<?php echo($total); ?>" id="buy_now">Pay Now</button>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
        $('body').on('click', '.buy_now', function(e){
           
            var totalAmount = <?php echo($total); ?>;
            var product_id =  <?php echo($resort); ?>;
            var resort_name="<?php echo($resort_name); ?>";
            var email_id= "<?php echo($email); ?>";
            var date_of_book=document.getElementById("dateBook").value;
            var name="<?php echo($name); ?>";
            var phone="<?php echo($phone); ?>";
            var child=<?php echo($child); ?>;
            var adult=<?php echo($adult); ?>;
            alert(date_of_book);
            var options = {
            "key": "rzp_test_ndjLGQvKyoEZCo",
            "amount": totalAmount*100, 
            "name": "Picnic",
            "description": "Payment",
            "image": "",
            "handler": function (response){
                alert("working");
                console.log(response);
                $.ajax({
                url: 'processing.php',
                type: 'post',
                dataType: 'json',
                data: {
                razorpay_payment_id: response.razorpay_payment_id , total_Amount : totalAmount ,Product_id : product_id , email:email_id, dateOfBook:date_of_book,customer_name:name,phone:phone,child:child,adult:adult,resort_name:resort_name
                }, 
                success: function (msg) {
                    alert("from success ");
                    console.log(msg);
                    //var jsonData = json_decode(msg);
                    if(msg.success=="1"){
                   
                        alert("from inside successs");
                        window.location.href = 'thank-you.php';                                                                                                                                                    
                    }else{
                        alert("error");
                    }
                    alert("from ajax");
                    console.log(msg);
                    
                },
                error:function(msg){
                    console.log(msg);
                    alert("from error");
                }
            
                })
            },
            "theme": {
            "color": "#528FF0"
            }
        
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        });
        </script>


<?php
//}
// else{
//     header("Location:../index.php");
// }
// if(isset($_POST['bookingDate'])&& strlen($_POST['bookingDate'])>0 ){
   
    
//     $date_of_book=$_POST['bookingDate'];
//     if($date_of_book>=$today_date){
//         $name=$_POST['name'];
//         $adult=$_POST['adult'];
//         $child=$_POST['child'];
//         $phone=$_POST['phone'];
//         $email=$_POST['email'];
//         $resort=$_POST['resort_name'];
//         $insert_query="insert into customer_book(date_of_booking,customer_name,num_adult,num_child,phone_number,email,day_of_booking,resort_id) values ('$date_of_book','$name',$adult,$child,'$phone','$email',now(),$resort)";
//         $pg_query=pg_query($connect,$insert_query);                                                                                         
//     }
//     else{
//         echo "Please enter date which is greater then ahead";
//     }
// }

// else{
//     header("Location:../index.html");
// }
require("../footer.html");

?>