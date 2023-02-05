<?php
include './headers.php';
require('../conn.php');

if (!isset($_SESSION['email']) && strlen($_SESSION['email']) < 1 && !isset($_SESSION['park_logged_in']) && !$_SESSION['park_logged_in'] == true) {
    $url = './login.php';
    echo "<script LANGUAGE='JavaScript'>alert('Please Login first!!!'); window.location.href= '" . $url . "'; </script>";
    exit();
}
?>


<html>

<head>
    <link rel="stylesheet" href="../css/table.css">

</head>

<body>

    <div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="container-fluid">
            <div class="stateCityDiv slctStateDiv">
                <div class="col-lg-3 col-xs-3 form-group ">
                    <label>From Date </label>
                    <input type="date" name="from_date" id="from_date" placeholder="" value="<?php echo $_POST['from_date'] ?>" class="form-control">
                    <span class="inptEdt"></span>
                </div>
                <div class="col-lg-3 col-xs-3 form-group slctCityStateDiv">
                    <label>To Date </label>
                    <input type="date" name="to_date" id="to_date" placeholder="" value="<?php echo $_POST['to_date'] ?>" class="form-control">
                    <span class="inptEdt"></span>
                </div>

                <div class="col-lg-3 col-xs-3 form-group slctCityStateDiv">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <table id="alter">
        <thead>
            <tr>
                <th>Booking Id</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Customer Email</th>
                <th>Paid</th>
                <th>Payment Id</th>
                <th>Amount</th>
                <th>Date Of Booking</th>
                <th>Number Of Adults</th>
                <th>Number Of Child</th>
                <th>Resort Name</th>
                <th>DateTime</th>

                <th>Status</th>
                <th>Confirm</th>
            </tr>
        </thead>
        <tbody>
            <?php include './reports/filter.php';
            // echo $select;
            $pg_query = pg_query($connect, $select);
            $total_book = pg_fetch_all($pg_query);
            if (pg_num_rows($pg_query) > 0) {
                for ($j = 0; $j < count($total_book); $j++) {
                    include './reports/view-data.php';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
function check_status($status)
{

    $get_status = '';
    switch ($status) {
        case 1:
            $get_status = 'Booked';
            break;
        case 2:
            $get_status = 'Confirm By Resort';
            break;
        case 3:
            $get_status = 'Completed';
            break;
        case -1:
            $get_status = 'Cancelled By Resorts';
            break;
        case -2:
            $get_status = 'Cancelled By Admin';
            break;
        case -3:
            $get_status = 'Cancelled By Customer';
            break;
    }
    return $get_status;
}


?>
<script>
    function confirmBook(txt) {
        console.log(txt.value);
        console.log($(`#${txt.value}`)[0].checked)
        if($(`#${txt.value}`)[0].checked){
            $.ajax({
                url: './checkIn.php',
                type: "post",
                data: {
                    name: txt.value,
                    confirm:1
                },
                success: function(result) {
                    // console.log(result);
                    // if(result=="done"){
                        
                        $(`#status${txt.value}`).html("Completed");
                    // }
                }
            })
        }
        if(!$(`#${txt.value}`)[0].checked){
            $.ajax({
                url: './checkIn.php',
                type: "post",
                data: {
                    name: txt.value,
                    confirm:2
                },
                success: function(result) {
                    // console.log(result);
                    // if(result=="done"){
                        
                        $(`#status${txt.value}`).html("Booked");
                    // }
                }
            })
        }
       

    }
    $(document).ready(function() {
        $('#alter').DataTable({
            "bPaginate": false,
            fixedHeader: false,
            scrollX: false,
        });
    });
</script>