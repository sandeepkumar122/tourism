<html>

<head>
  <link rel="stylesheet" href="../asset/css/style.css">
  <link rel="stylesheet" href="../asset/css/boostrap.min.css">
  <script src="../asset/js/min.js"></script>
  <script src="../asset/js/tr.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="../css/cart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
  <?php
  include '../conn.php';
  if (!isset($_SESSION)) {
    session_start();
  }

  ?>

  <div class="header12">
    <a href="./../index.php" class="logo">CompanyLogo</a>
    <div class="header-right">
      <!-- <input type="text" id="search">
      <select name="" id="search-result"> -->
      <form autocomplete="off"><input type="text" name="q" id="q" onKeyUp="showResults(this.value)" />
        <div id="result"></div>
      </form>

      </select>
      <?php if (isset($_SESSION['logged_in']) && isset($_SESSION['email'])) { ?>
        <a href="#userdata">Hello <?php echo $_SESSION['name']; ?>!!!</a>
        <a href="./history.php">History</a>
        <a href="./logout.php">Logout</a>

      <?php } else { ?>
        <a href="./../login.php">Login</a>
        <a href="./../register.php">Register</a>
      <?php    } ?>
    </div>
  </div>
</body>

</html>
<script>
  $('#search-result').change(function() {
    var val = document.getElementById("search-result").value;
    console.log(val);
    window.location.href = "http://localhost/tourism/resorts/main.php?id=" + val;

  });

  $("#search").on('keypress', function(e) {
    var keynum;
    if (window.event) { // IE                  
      keynum = e.keyCode;
    } else if (e.which) { // Netscape/Firefox/Opera                 
      keynum = e.which;
    }
    keynum = String.fromCharCode(keynum);
    var search = document.getElementById("search").value;
    search += keynum;
    $.ajax({
      url: './recomendation.php',
      type: "post",
      data: {
        name: search
      },
      success: function(result) {
        console.log(result);
        $("#search-result").html(result);
      }
    })
  })


  var search_terms = ['Water Kingdom', 'Aqua Imagica', 'Adlabs Imagica', 'Mumbai Darshan', 'iphone', 'iphone 12'];

function autocompleteMatch(input) {
  if (input == '') {
    return [];
  }
  var reg = new RegExp(input)
  return search_terms.filter(function(term) {
	  if (term.match(reg)) {
  	  return term;
	  }
  });
}

function showResults(val) {
  res = document.getElementById("result");
  res.innerHTML = '';
  let list = '';
  let terms = autocompleteMatch(val);
  for (i=0; i<terms.length; i++) {
    list += '<li>' + terms[i] + '</li>';
  }
  res.innerHTML = '<ul>' + list + '</ul>';
}

</script>