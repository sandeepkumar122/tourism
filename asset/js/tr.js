
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
  var password = document.getElementById("password");
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

