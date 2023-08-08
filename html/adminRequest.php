
<?php
if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $state = $_POST['state'];
  $type = $_POST['typeofPerson'];
  $requestID = $_POST['requestID'];
  if ($type == "Donar") {
      $conn = new mysqli("localhost", "root" , "", "web_project");
      $sqlQuery = " UPDATE `donorreq` SET `Status`= '$state'  WHERE `requestID` = '$requestID' and `donarUserName` = '$id'";
      $conn->query($sqlQuery);
  }
  elseif ($type == "Patient") {
      $conn = new mysqli("localhost", "root" , "", "web_project");
      $sqlQuery = " UPDATE `patientreq` SET `accept_status`='$state' WHERE `requestID` = '$requestID' and `patientUserName` =  '$id'";
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
    <link rel="stylesheet" href="../css/admin.request.css">
    <link rel="stylesheet" href="../css/admin.css">
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
                  <a href="admin.php" class="nav_link"> 
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
                  </a> <a href="adminRequest.php" class="nav_link active"> 
                    <i class="fa-solid fa-code-pull-request" style="color: #ffffff;"></i> 
                    <span class="nav_name">Request</span> </a> 
                    <a href="adminProfile.php" class="nav_link"> 
                      <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                      <span class="nav_name">Profile</span> 
                    </a> <a href="" class="nav_link"> 
                      <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
                      <span class="nav_name">Logout</span> 
                  </div>
            </div> <a href="#" class="nav_link"><span class="nav_name"></span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="benefits">Patient Table</div>
      <div class="table-responsive">
      <table class="table" id = "myTablePatient">
          <thead>
              <tr>
                  <th class="text-center">Request Number</th> 
                  <th class="text-center">FName</th>
                  <th class="text-center">SName</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">City</th>
                  <th class="text-center">Number Of Units</th>
                  <th class="text-center">Blood Type</th>
                  <th class="text-right">Actions</th>
              </tr>
          </thead>
          <tbody>
          <?php
                      $conn = new mysqli("localhost", "root" , "", "web_project");
                      $sqlQuery = " SELECT patients.FirstName,patients.SecondName ,patients.UserName , patients.Email , patients.City , patientreq.number_of_unit , patients.BloodType from `patients`, `patientreq` where patients.UserName  = patientreq.patientUserName ";
                      $result = mysqli_query($conn , $sqlQuery);
                      while ($row = mysqli_fetch_assoc($result)) {
                     ?> 
              <tr onclick = "getIndexPatient(this)">
                  <td class="text-center"><?php echo $row["FirstName"];?></td>
                  <td class="text-center"><?php echo $row["SecondName"];?></td>
                  <td class="text-center"><?php echo $row["UserName"];?></td>
                  <td class="text-center"><?php echo $row["Email"];?></td>
                  <td class="text-center"><?php echo $row["City"];?></td>
                  <td class="text-center"><?php echo $row["number_of_unit"];?></td>
                  <td class="text-center"><?php echo $row["BloodType"];?></td>
                  <td class="td-actions text-right">
                    <button type="button" onclick= "acceptPatient()" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" id="Accept" data-original-title="" title="">
                      <i class="fa-solid fa-check"></i>
                    </button>
                    <button type="button" onclick= "declinePatient()" rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" id="decline" data-original-title="" title="">
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                </td>
                  <?php
                      }
                  ?>
          </tbody>
      </table>
      </div>

      <div class="benefits">Donar Table</div>
    <div class="table-responsive">
      <table class="table" id = "myTable">
          <thead>
              <tr>
                  
                  <th class="text-center">Request Number</th>
                  <th class="text-center">FName</th>
                  <th class="text-center">SName</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">City</th>
                  <th class="text-center">Number of Units</th>
                  <th class="text-center">Blood Type</th>
                  <th class="text-right">Actions</th>
              </tr>
          </thead>
          <tbody>
          <?php
                      $conn = new mysqli("localhost", "root" , "", "web_project");
                      $sqlQuery = "SELECT donorreq.requestID , donars.FirstName , donars.SecondName , donars.UserName , donars.Email , donars.City , donorreq.BType , donars.BloodType FROM donars , donorreq WHERE donars.UserName = donorreq.donarUserName and donorreq.Status = 'Waiting' ";
                      $result = mysqli_query($conn , $sqlQuery);
                      while ($row = mysqli_fetch_assoc($result)) {
                     ?> 
                  <tr onclick = "getIndexDonar(this)">
                  <td class="text-center"><?php echo $row["requestID"];?></td>
                  <td class="text-center"><?php echo $row["FirstName"];?></td>
                  <td class="text-center"><?php echo $row["SecondName"];?></td>
                  <td class="text-center"><?php echo $row["UserName"];?></td>
                  <td class="text-center"><?php echo $row["Email"];?></td>
                  <td class="text-center"><?php echo $row["City"];?></td>
                  <td class="text-center"><?php echo $row["BType"];?></td>
                  <td class="text-center"><?php echo $row["BloodType"];?></td>
                  <td class="td-actions text-right">
                    <button type="button" onclick = "acceptDonar()" rel="tooltip" class="btn btn-info btn-just-icon btn-sm" id="Accept" data-original-title="" title="">
                      <i class="fa-solid fa-check"></i>
                    </button>
                    <button type="button" onclick= "declineDonar()";  rel="tooltip" class="btn btn-danger btn-just-icon btn-sm" id="decline" data-original-title="" title="">
                      <i class="fa-solid fa-xmark"></i>
                    </button>
                </td>
                  <?php
                      }
                  ?>
          </tbody>
      </table>
      </div>
    <!-- /#wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/adminRequest.js"></script>
    <script src="../js/admin.js"></script>
  </body>
</html>