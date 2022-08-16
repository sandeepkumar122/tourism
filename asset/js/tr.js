<script src="../asset/js/min.js"></script>

$('#show_pass_check').on("change", function () {
  var y = document.getElementById("password");

  console.log(y.value);
  if (y.type == "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
});

$('#cpassword').on("change", function () {
  var password = document.getElementById("password").value;
  var cpass=this.value;
  if(password!=cpass){
    swal({
      title: "OOPS!",
      text: "Password Does Not Match With Confirm password!",
      icon: "warning",
      button: "OKAY",
    });
    $("#password").val("");
    $("#cpassword").val("");
  }
});

$(document).ready(function () {
  function getISODate() {
    var d = new Date();
    return d.getFullYear() - 14 + '-' +
      ('0' + (d.getMonth())).slice(-2) + '-' +
      ('0' + d.getDate()).slice(-2);
  }
  $('#bookingDate').prop('min', getISODate());

});

