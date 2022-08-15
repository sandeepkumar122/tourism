alert("working")

  function show_pass() {
    var y = document.getElementById("password");
    console.log(y.value);
    if (y.type == "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }