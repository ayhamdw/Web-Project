
<?php
$conn = new mysqli("localhost", "root" , "", "web_project");
$sqlQuery = " SELECT * FROM `admin` ";
$result = mysqli_query($conn , $sqlQuery);
$row = mysqli_fetch_assoc($result);

    $firstName = $row["FirstName"];
    $secondName = $row["SecondName"];
    $userName = $row["UserName"];
    $Email = $row["Email"];
    $City = $row["City"];
    $PhoneNumber = $row["PhoneNumber"];
    $password = $row["Password"];
?>
<?php
if (isset($_POST['FName'])){
  $fname = $_POST["FName"];
  $secondName = $_POST["SName"];
  $user = $_POST["user"];
  $email = $_POST["email"];
  $city = $_POST["city"];
  $phoneNumber = $_POST["phone"];
  $password = $_POST["pass1"];
  $confirm = $_POST["pass2"];
  if (empty($password) or empty($confirm)){
    $sqlQuery = "UPDATE `admin` SET `FirstName`='$fname',`SecondName`='$secondName',`UserName`='$user',`Email`='$email',`City`='$city',`PhoneNumber`='$phoneNumber'";
    $conn->query($sqlQuery);
  }
  elseif($password!=$confirm) {
    echo '<script>alert("Passwords do not match")</script>';
  }
  else {
    $sqlQuery = "UPDATE `admin` SET `FirstName`='$fname',`SecondName`='$secondName',`UserName`='$user',`Email`='$email',`City`='$city',`PhoneNumber`='$phoneNumber' , `password` = '$password'";
    $conn->query($sqlQuery);
  }
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <!--English Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caladea:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!--Main Css File-->
    <!-- <link rel="stylesheet" href="../css/adminSetting.css"> -->

    <link rel="stylesheet" href="../css/adminSetting.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin.request.css">
</head>

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle"> 
        <i class='bx bx-menu' id="header-toggle" style="color: rgb(188, 55, 55); font-size: 25px"></i> 
      </div>
  </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
              <a href="admin.php" class="nav_logo" style="text-decoration: none;"> 
                <i class="fa-solid fa-droplet" style="color: #ffffff; font-size: 25px;"></i>
                <span class="nav_logo-name">Admin Page</span> 
              </a>
                <div class="nav_list"> 
                  <a href="admin.php" class="nav_link "> 
                    <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    <span class="nav_name">Home</span> 
                  </a> 
                  <a href="adminPatient.php" class="nav_link"> 
                    <i class="fa-solid fa-hospital-user" style="color: #ffffff;"></i>
                    <span class="nav_name">Patient</span> 
                  </a> 
                  <a href="adminDonar.php" class="nav_link"> 
                    <i class="fa-solid fa-hand-holding-medical" style="color: #ffffff;"></i> 
                    <span class="nav_name">Donar</span> 
                  </a> <a href="adminRequest.php" class="nav_link"> 
                    <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i> 
                    <span class="nav_name">Request</span> </a> 
                    <a href="adminProfile.php" class="nav_link active"> 
                      <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                      <span class="nav_name">Profile</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                      <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
                      <span class="nav_name">Logout</span> 
                  </div>
            </div> <a href="#" class="nav_link"> <span class="nav_name"></span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        
                        <div class="row mt-3">
                          <form action="adminProfile.php" method="post" id='formId'>
                          <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First name" value="<?php echo $firstName; ?>" name = "firstName" id="firstName"></div>
                            <div class="col-md-6"><label class="labels">Second Name</label><input type="text" class="form-control" value="<?php echo $secondName; ?>" placeholder="Second name" name = "secondName" id="secondName"></div>
                        </div>
                          <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="Enter Username" value="<?php echo $userName; ?>" name = "userName" id="userName"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Enter Email" value="<?php echo $Email; ?>" name = "Email" id="Email"></div>
                            <div class="col-md-12"><label class="labels">City </label><input type="text" class="form-control" placeholder="Enter City" value="<?php echo $City; ?>" name = "city" id="City"></div>
                            <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="Enter Your Phone Number" value="<?php echo $PhoneNumber; ?>" name = "phoneNumber" id="phoneNumber"></div>
                            <div class="mt-5 text-center"><input type = "submit" id="button1" onclick = "SendData()"></input></div>

                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                  <div class="p-3 py-5 mt-3">
                  <div class="col-md-12"><label class="labels">Your New Password</label><input type="password" class="form-control" placeholder="New Password" value="" id="password"></div> <br>
                    <div class="col-md-12"><label class="labels">Confirm Your Password</label><input type="password" class="form-control" placeholder="Confirm Password" value="" id="confirmPassword"></div>
                </div>
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
    </div>


    <!-- /#wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../js/admin.js"></script>
    <script src = "../js/adminProfile.js"></script>
    <script>
        $(function() {
  $( "#button" ).click(function() {
    $( "#button" ).addClass( "onclic", 250, validate);
  });

  function validate() {
    setTimeout(function() {
      $( "#button" ).removeClass( "onclic" );
      $( "#button" ).addClass( "validate", 450, callback );
    }, 2250 );
  }
    function callback() {
      setTimeout(function() {
        $( "#button" ).removeClass( "validate" );
      }, 1250 );
    }
  });
    </script>
</body>
</html>