function SendData() {
  let firstName = document.getElementById("firstName").value;
  let secondName = document.getElementById("secondName").value;
  let userName = document.getElementById("userName").value;
  let email = document.getElementById("Email").value;
  let city = document.getElementById("City").value;
  let phoneNumber = document.getElementById("phoneNumber").value;
  let password = document.getElementById("password");
  let confirmPassword = document.getElementById("confirmPassword");
  let pass1 = password.value;
  let pass2 = confirmPassword.value;
  if (pass1 != pass2) {
    alert("Please Enter Two Identical Password");
  }
  $(document).ready(function () {
    var url = window.location.href;
    $.ajax({
      type: "POST",
      url: "adminProfile.php",
      data: {
        FName: firstName,
        SName: secondName,
        user: userName,
        email: email,
        city: city,
        phone: phoneNumber,
        pass1: pass1,
        pass2: pass2,
      },
      success: function (result) {},
      error: function () {
        alert("Error");
      },
    });
  });
}
