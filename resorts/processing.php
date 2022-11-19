
 <?php
   //   $_POST['razorpay_payment_id']='csjdsc8383838';
   //   $_POST['Product_id']=12;
   //   $_POST['email']='sandeep@gmail.com';
   //   $_POST['total_Amount']=1234;
   //   $_POST['dateOfBook']='2022-5-18';
   //   $_POST['customer_name']='sandeep gupta';
   //   $_POST['phone']=300393934;
   //   $_POST['child']=1;
   //   $_POST['adult']=2;
   //   $_POST['resort_name']='water kingdom';
   //   require("../header.php");
   // include './conn.php';
   if (!isset($_SESSION)) {
      session_start();
   }
   $connect = pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
   if (isset($_POST['razorpay_payment_id']) && $_POST['razorpay_payment_id'] && isset($_POST['Product_id']) && $_POST['Product_id'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['total_Amount']) && $_POST['total_Amount']) {
      $payment_id = $_POST['razorpay_payment_id'];
      $product_id = $_POST['Product_id'];
      $email = $_POST['email'];
      $amount = $_POST['total_Amount'];
      $booking_id = "BOOK" . time();
      $name = $_POST['customer_name'];
      $phone = $_POST['phone'];
      $child = $_POST['child'];
      $adult = $_POST['adult'];
      $resort_name = $_POST['resort_name'];


      $_SESSION['resort_name'] = $resort_name;
      $_SESSION['booking_id'] = $booking_id;
      $_SESSION['payment_id'] = $payment_id;
      $_SESSION['email'] = $email;
      $_SESSION['amount'] = $amount;
      // $date_of_book=date('Y-m-d',$_POST['dateOfBook']);
      $_SESSION['name'] = $name;
      $_SESSION['phone'] = $phone;
      $_SESSION['child'] = $child;
      $_SESSION['adult'] = $adult;

      $date = new \DateTime($_POST['dateOfBook']);

      $date = (array)$date;
      $date_of_book = $date['date'];
      $_SESSION['date_of_book'] = $date_of_book;

      $query = "insert into paid_booking(booking_id,name,email,paid,payment_id,amount,resort_id,date_of_book,num_adult,num_child,resort_name,phone,day_of_booking,canceled,status) 
   values('$booking_id','$name','$email',True,'$payment_id',$amount,$product_id,'$date_of_book',$adult,$child,'$resort_name',$phone,now(),false,1)";
      $pg_query = pg_query($connect, $query);

      if ($pg_query) {
         echo json_encode(array('success' => 1));
      } else {
         echo json_encode(array('success' => 0));
      }
   } else if (isset($_POST['paid']) && $_POST['paid'] == "no") {
      $product_id1 = $_POST['resort_id'];
      $email1 = $_POST['email'];
      $amount1 = $_POST['total'];
      $booking_id1 = "BOOK" . time();
      $name1 = $_POST['customer'];
      $phone1 = $_POST['phone'];
      $child1 = $_POST['child'];
      $adult1 = $_POST['adult'];
      $resort_name1 = $_POST['resort_name'];
      $date_of_book1 = $_POST['bookingDate'];
      $paid1 = $_POST['paid'];

      $insert_query_unpaid = "insert into paid_booking(booking_id,name,email,paid,amount,resort_id,date_of_book,num_adult,num_child,resort_name,phone,day_of_booking,canceled,status) 
   values('$booking_id1','$name1','$email1',False,$amount1,$product_id1,'$date_of_book1',$adult1,$child1,'$resort_name1',$phone1,now(),false,1)";
      $pg_query_unpaid = pg_query($connect, $insert_query_unpaid);
      if ($pg_query_unpaid) {
         $_SESSION['resort_name'] = $resort_name1;
         $_SESSION['booking_id'] = $booking_id1;
         $_SESSION['email'] = $email1;
         $_SESSION['amount'] = $amount1;
         $_SESSION['name'] = $name1;
         $_SESSION['phone'] = $phone1;
         $_SESSION['child'] = $child1;
         $_SESSION['adult'] = $adult1;

         $_SESSION['date_of_book'] = $date_of_book1;

         $url = './thank-you.php';
         echo "<script LANGUAGE='JavaScript'>alert('Booking Is Done'); window.location.href= '" . $url . "'; </script>";
         exit();
      } else {
         $url = './error.php';
         echo "<script LANGUAGE='JavaScript'>alert('Some error Occured!! please try again.'); window.location.href= '" . $url . "'; </script>";
         exit();
      }
   }
   //  else {
   //    header("Location:../index.php");
   // }

   if(isset($_POST['cancel'])){
      $cust_name=$_POST['cust_name'];
      $phone=$_POST['phone'];
      $bookingDate=$_POST['bookingDate'];
      $adult=$_POST['adult'];
      $child=$_POST['child'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
   }

   ?>