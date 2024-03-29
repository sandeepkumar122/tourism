<?php
include './headers.php';
require('../conn.php');
if(!isset($_SESSION['admin_logged_in']) && !isset($_SESSION['admin_email'])){
  header('Location:./admin-login');
}
$select_water="select * from parks where park_status=1";
$select_theme="select * from parks where park_status=2";
$select_education="select * from parks where park_status=3";
$select_pg_query_water=pg_query($connect,$select_water);
$select_pg_query_theme=pg_query($connect,$select_theme);
$select_pg_query_education=pg_query($connect,$select_education);
$water=pg_fetch_all($select_pg_query_water);
$theme=pg_fetch_all($select_pg_query_theme);
$education=pg_fetch_all($select_pg_query_education);

?>
<html>

<head>
    <title>View Resorts</title>
    <link rel="stylesheet" href="./css/table.css">

</head>

<body>
    <table id="alter">
       <thead>
        <tr>
            <th>Park Id</th>
            <th>Park Name</th>
            <th>Park Email</th>
            <th>Child Price</th>
            <th>Adult Price</th>
            <th>Park Contact</th>
            <th>Park Address</th>
            <th>Contact Person Name</th>
            <th>Contact Person Number</th>
            <th>Park Approval Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            for($i=0;$i<count($water);$i++){
        ?>
        <tr>
            <td><?php echo $water[$i]['park_id'] ?></td>
            <td><?php echo $water[$i]['park_name'] ?></td>
            <td><?php echo $water[$i]['park_email'] ?></td>
            <td><?php echo $water[$i]['child_price'] ?></td>
            <td><?php echo $water[$i]['adult_price'] ?></td>
            <td><?php echo $water[$i]['park_contact'] ?></td>
            <td><?php echo $water[$i]['park_address'] ?></td>
            <td><?php echo $water[$i]['park_address'] ?></td>
            <td><?php echo $water[$i]['contact_person_name'] ?></td>
            <td><?php echo $water[$i]['contact_person_number'] ?></td>
            <td><button>Approve</button></td>

        </tr>
      <?php } ?><br>
     
      <?php
            for($i=0;$i<count($theme);$i++){
          
        ?>
        <tr>
            <td><?php echo $theme[$i]['park_id'] ?></td>
            <td><?php echo $theme[$i]['park_name'] ?></td>
            <td><?php echo $theme[$i]['park_email'] ?></td>
            <td><?php echo $theme[$i]['child_price'] ?></td>
            <td><?php echo $theme[$i]['adult_price'] ?></td>
            <td><?php echo $theme[$i]['park_contact'] ?></td>
            <td><?php echo $theme[$i]['park_address'] ?></td>
            <td><?php echo $theme[$i]['park_address'] ?></td>
            <td><?php echo $theme[$i]['contact_person_name'] ?></td>
            <td><?php echo $theme[$i]['contact_person_number'] ?></td>
            <td><button>Approve</button></td>

        </tr>
      <?php } ?><br>
      <?php
            for($i=0;$i<count($education);$i++){
          
        ?>
        <tr>
            <td><?php echo $education[$i]['park_id'] ?></td>
            <td><?php echo $education[$i]['park_name'] ?></td>
            <td><?php echo $education[$i]['park_email'] ?></td>
            <td><?php echo $education[$i]['child_price'] ?></td>
            <td><?php echo $education[$i]['adult_price'] ?></td>
            <td><?php echo $education[$i]['park_contact'] ?></td>
            <td><?php echo $education[$i]['park_address'] ?></td>
            <td><?php echo $education[$i]['park_address'] ?></td>
            <td><?php echo $education[$i]['contact_person_name'] ?></td>
            <td><?php echo $education[$i]['contact_person_number'] ?></td>
            <td><button>Approve</button></td>

        </tr>
      <?php } ?></tbody>
    </table>
</body>
<script>
  $(document).ready(function() {
    $('#alter').DataTable({
      "bPaginate": false,
      fixedHeader: false,
      scrollX: false,
    });
  }); 
</script>
</html>