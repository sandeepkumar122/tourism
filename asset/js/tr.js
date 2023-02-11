
//  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
$('#bookingDate').on("change", function () {
  // alert("working")
  // $('#bookingDate').on("change",function(){
//   // alert("working");
//   alert(this.val)
//   var d = new Date();
// })
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
function checkPass(txt){
  // let pass=$("#MainPassword").value;
  let pass=document.getElementById("MainPassword").value;
  console.log(pass,` this is first password `)
  if(pass!=txt.value){
      alert("Password Does Not Match With Confirm Password!!!")
      txt.value="";
  }
  let hash=encrypt(pass);
  $("#password").val(hash);
  // console.log(txt.value)
}
function bookingDateFunc(txt){
  alert("working")
  // var today=new Date();
  // var enterDate=txt.val();
  // if(enterDate<today){
  //     alert("Date cannot be less then today");
  //     $("#bookingDate").val="";
  // }
}

