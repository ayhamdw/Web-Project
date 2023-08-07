
<?php
if (isset($_POST["firstName"])) {
  $result = "";
  $fName = $_POST["firstName"];
  $SName = $_POST["secondName"];
  $userName = $_POST["Username"];
  $email = $_POST["email"];
  $city = $_POST["city"];
  $phoneNumber = $_POST["phoneNumber"];
  $birthDay = $_POST["birthday"];
  $bloodType = $_POST["bloodType"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  if ($password!=$confirmPassword)
    echo "Enter Two identical Password";
    else {
      $sqlQuery = "INSERT INTO `patients` (`FirstName`, `SecondName`, `UserName`, `Email`, `City`, `PhoneNumber`, `BirthDate`, `BloodType`, `Password`) VALUES ('$fName', '$SName', '$userName', '$email', '$city', '$phoneNumber', '$birthDay', '$bloodType', SHA1($password))";
      $conn = new mysqli("localhost", "root" , "", "web_project");
      $conn->query($sqlQuery);
      $sqlQuery = " SELECT * FROM `patients` ";
      $result = $conn->query($sqlQuery);
    }
}
if (isset($_POST["id"])) {
$random = $_POST["id"];
echo $random;
$sqlQuery = "Delete from `patients` where `UserName` ='". $random ."'";
$conn = new mysqli("localhost", "root" , "", "web_project");
$conn->query($sqlQuery);
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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/adminPatient.css">
</head>

  <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> 
          <i class='bx bx-menu' id="header-toggle" style="color: rgb(188, 55, 55);"></i> 
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
                  <a href="adminPatient.php" class="nav_link active"> 
                    <i class="fa-solid fa-hospital-user" style="color: #ffffff;"></i>
                    <span class="nav_name">Patient</span> 
                  </a> <a href="adminDonar.php" class="nav_link"> 
                    <i class="fa-solid fa-hand-holding-medical" style="color: #ffffff;"></i> 
                    <span class="nav_name">Donar</span> 
                  </a> <a href="adminRequest.php" class="nav_link"> 
                    <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i> 
                    <span class="nav_name">Request</span> </a> 
                    <a href="adminProfile.php" class="nav_link"> 
                      <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                      <span class="nav_name">Profile</span> 
                    </a> <a href="#" class="nav_link"> 
                      <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
                      <span class="nav_name">Logout</span> 
                  </div>
            </div> <a href="#" class="nav_link"> </a>
        </nav>
    </div>
    <!--Container Main start-->
  <div class="row">
    <div class="col-sm-12">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <div class="card flex-row my-4 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-body p-1 p-sm-5">
                <h5 class="card-title text-center mb-4 fw-light fs-5">Patient Register</h5>
                <form action="adminPatient.php" method="post" id='formId'>    
                    <label style="display: inline;">
                      <input name="firstName" id = "firstName" type="text" required="required" style="display: inline; max-width: 50%;" />
                      <span>First Name</span>
                    </label>
                    <label style="display: inline; margin-left: 4px;">
                      <input name="secondName" type="text" required="required" style="display: inline; max-width: 49%;"/>
                      <span>MidName</span>
                    </label>
                  
                  
                    <label style="display: inline; margin-left: 4px;">
                      <input name="email" type="text" required="required"/>
                      <span>Email</span>
                    </label>

                    <label style="display: inline; margin-left: 4px;">
                      <input type= "text" name="Username" required="required"/>
                      <span>Username</span>
                    </label>
                  
                  
                    <label style="display: inline; margin-left: 4px;">
                      <input type="password" name="password" required="required"/>
                      <span>Password</span>
                    </label>
                  
                  
                    <label style="display: inline; margin-left: 4px;">
                      <input type="password" name="confirmPassword" required="required"/>
                      <span>PassAgain</span>
                    </label>
                    <label style="display: inline; margin-left: 4px;">
                      <input type="text" name="city" required="required"/>
                      <span>City</span>
                    </label>

                    <label style="display: inline; margin-left: 4px;">
                      <input type="text" name="phoneNumber" required="required"/>
                      <span>Phone</span>
                    </label>

                    <label style="display: inline; margin-left: 4px;">
                      <input type="date" name="birthday" class="form-control" id="date" required  name="date" style="height: 60px;">
                      <span>Date</span>
                    </label>
                    <label for="">
                      <select class="form-select" aria-label="Default select example" style="width:75%" name="bloodType">
                        <option selected>Blood Unit</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                      </select>
                    </label>
                    <div class="mt-5 text-center">
                      <input type="submit" id="button" class="button"></input>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-12">
                        <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Search within table</h2>
                        <div style="display: flex; justify-content: flex-end; align-items: center;">
                          <i class="fa-solid fa-trash" style="color: #bc3737; font-size: 25px; margin: 10px;"onclick="deletePatient()"></i>
                        </div>
                        <div class="input-group md-form form-sm form-2 pl-0">
                          <input class="form-control my-0 py-1 pl-3 purple-border" type="search" placeholder="Search something here..." aria-label="Search" onkeyup="myFunction()" id="myInput">
                          <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!--Table-->
                <div class="table-responsive">
                  <table class="table table-striped" id= "myTable">
                    <!--Table head-->
                    <thead>
                        <tr class="headerClass">
                            <th>#</th>
                            <th>First Name</th>
                            <th>Mid Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Birth</th>
                            <th>Blood Type</th>
                        </tr>
                    </thead>
                    <!--Table body-->
                    <tbody>
                     <?php
                      $conn = new mysqli("localhost", "root" , "", "web_project");
                      $sqlQuery = " SELECT * FROM `patients` ";
                      $result = mysqli_query($conn , $sqlQuery);
                      while ($row = mysqli_fetch_assoc($result)) {
                     
                     ?> 
                      <tr onclick="getIndex(this)">
                        <td><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"></td>
                        <td><?php echo $row["FirstName"];?></td>
                        <td><?php echo $row["SecondName"];?></td>
                        <td><?php echo $row["UserName"];?></td>
                        <td><?php echo $row["Email"];?></td>
                        <td><?php echo $row["City"];?></td>
                        <td><?php echo $row["PhoneNumber"];?></td>
                        <td><?php echo $row["BirthDate"];?></td>
                        <td><?php echo $row["BloodType"];?></td>
                      </tr>    

                    <?php
                      }
                    ?>
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
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
    <script src="../js/adminPatient.js"></script>
    <script>
  
  </script>
</body>
</html>