
 <?php
  // $_POST['razorpay_payment_id']='csjdsc8383838';
  // $_POST['Product_id']=12;
  // $_POST['email']='sandeep@gmail.com';
  // $_POST['total_Amount']=1234;
  // $_POST['dateOfBook']='2022-5-18';
  // $_POST['customer_name']='sandeep gupta';
  // $_POST['phone']=300393934;
  // $_POST['child']=1;
  // $_POST['adult']=2;
  // $_POST['resort_name']='water kingdom';
  require("../header.php");
// include './conn.php';
$connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
if(isset($_POST['razorpay_payment_id']) && $_POST['razorpay_payment_id'] && isset($_POST['Product_id']) && $_POST['Product_id'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['total_Amount']) && $_POST['total_Amount']){
   $payment_id=$_POST['razorpay_payment_id'];
   $product_id=$_POST['Product_id'];
   $email=$_POST['email'];
   $amount=$_POST['total_Amount'];
   $booking_id = "BOOK" . time();
   $name=$_POST['customer_name'];
   $phone=$_POST['phone'];
   $child=$_POST['child'];
   $adult=$_POST['adult'];
   $resort_name=$_POST['resort_name'];

   session_start();
   $_SESSION['resort_name']=$resort_name;
   $_SESSION['booking_id']=$booking_id;
   $_SESSION['payment_id']=$payment_id;
   $_SESSION['email']=$email;
   $_SESSION['amount']=$amount;
   // $date_of_book=date('Y-m-d',$_POST['dateOfBook']);
   $_SESSION['name']=$name;
   $_SESSION['phone']=$phone;
   $_SESSION['child']=$child;
   $_SESSION['adult']=$adult;
  
   	
	$date=new \DateTime($_POST['dateOfBook']);
 
	$date=(array)$date;
	$date_of_book=$date['date'];
   $_SESSION['date_of_book']=$date_of_book;
   //$booking_id=1;
  //  echo "$date_of_book";
//   $booking=rand(10,10000000)."".rand(10,10000000);
//    $booking_id=validate_booking($booking);
   // if(!$check){
   //    $booking_id=rand(10,10000000)."".rand(10,10000000);
   // }

   // create table paid_booking(
   //    booking_id int PRIMARY KEY,
   //    name varchar(200),
   //    email varchar(40),
   //    paid boolean,
   //    payment_id varchar(255),
     
   //    amount int
   //    resort_id int,
   //    date_of_book date,

   //    num_adult int,
   //    num_child int,
   //    resort_name varchar(255),
   //    phone varchar(15),
      
   //    day_of_booking date,
      
      
  
   // $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
   $query="insert into paid_booking(booking_id,name,email,paid,payment_id,amount,resort_id,date_of_book,num_adult,num_child,resort_name,phone,day_of_booking) 
   values('$booking_id','$name','$email',True,'$payment_id',$amount,$product_id,'$date_of_book',$adult,$child,'$resort_name',$phone,now())"; 
   $pg_query=pg_query($connect,$query); 
   
   if($pg_query){
      echo json_encode(array('success' => 1));
   }
   else{
      echo json_encode(array('success' => 0));
   }
  }
  else{
   header("Location:../index.php");
  }
//  else{
//     echo json_encode(array('success' => 0));
//  }

//  function validateBooking(,$connect,$num){
//       $query="select booking_id from paid_booking where booking_id=$num";
//       $pg_query=pg_query($connect,$query); 
//       if(pg_num_rows($pg_query)>0){
//          $id=generate_id();
//          validateBooking($id);
//       }else{
//          return $num;
//       }
//  }
//  function generate_id(){
//    $booking_id=rand(10,10000000)."".rand(10,10000000);
//    return $booking_id;
//  }
 ?>