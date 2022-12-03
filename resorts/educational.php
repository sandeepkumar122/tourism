<?php
require("./header.php");
include './conn.php';
// $connect=pg_connect("host=localhost port=5432 dbname=traiveling user=postgres password=1234");
$query="select * from parks where park_status=3";
$pg_query=pg_query($connect,$query);
$result=pg_fetch_all($pg_query);

for($i=0;$i<count($result);$i++){ 
    
    
?>
<div class="main-container">
    <div class="sub-container">
        <a href="main.php?id=<?php print_r($result[$i]['park_id']); ?>">
            
            <img src=<?php print_r($result[$i]['image']); ?> class="image-11">
        </a>
        
    </div>
    
    <div class="info-11">
        <div class="info-inside" style="text-align:center;">
            <h1 style="text-align:center;" class="kkp-11 space"><?php  print_r($result[$i]['park_name']);?></h1>
            
            <h1 class="kkp-11 bg" >₹<?php print_r($result[$i]['adult_price']); ?></h1>
            <h2 class="kkp-11 sm"><del>₹1200</del></h2>
        </div>
       <!-- <form style="text-align:center;" method="get" action="main.php?id=<?php print_r($result[$i]['id']); ?>" >
           <input type="submit" value="Book Now">
        </form> -->
    </div>  
</div>
<hr>
<?php
}
require("../footer.html");
?>

<style>
    body{
        background-color:#e6e6ff;
    }
    .info-inside{
        border:1px solid black;
        margin:auto;
        width:900px;
        display:flex;
        
    }
    .main-container{
        margin-top:30px;
       margin-bottom:50px;
       
    }
    .sub-container{
        text-align:center;
    }
    .image-11{
       
        height: 300px;
        width: 900px;
    }
   
    .headi{
        text-align:center;
    }
    .kkp-11{
        
        display:inline;
        
    }
    .space{
        margin-right:500px;
    }
    .bg{
        color:#ff0000;
    }
    .sm{
        margin-left:10px;
    }
    </style>