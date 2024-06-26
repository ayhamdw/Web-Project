                                                                                                                                                                                                                                    
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
                  <a href="admin.php" class="nav_link active"> 
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
                    <a href="adminProfile.php" class="nav_link"> 
                      <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                      <span class="nav_name">Profile</span> 
                    </a> <a href="#" class="nav_link"> 
                      <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>
                      <span class="nav_name">Logout</span> 
                  </div>
            </div> <a href="#" class="nav_link"><span class="nav_name"></span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="d-flex flex-row justify-content-center flex-wrap">
          <div class="card text-black bg-primary mb-3 mx-3 bg-light" style="width: 20rem; max-width: 20rem; height: 10rem; max-height: 10rem;">
            <div class="card-header">Notification</div>
            <div class="card-body">
              <h5 class="card-title">Number Of Blood Units</h5>
            </div>
          </div>
          <div class="card text-black bg-primary mb-3 mx-3 bg-light" style="width: 20rem; max-width: 20rem; height: 10rem; max-height: 10rem;">
            <div class="card-header">Notification</div>
            <div class="card-body">
              <h5 class="card-title">Number of Donars</h5>
            </div>
          </div>
          <div class="card text-black bg-primary mb-3 mx-3 bg-light" style=" width: 20rem; max-width: 20rem; height: 10rem; max-height: 10rem;">
            <div class="card-header">Notification</div>
            <div class="card-body">
              <h5 class="card-title">Number Of Patients</h5>
            </div>
          </div> 
          </div>
          <div class="d-flex">
            <div class="d-flex justify-content-between flex-row mx-3" id="classGraph">
              <canvas id="pieChart" style="width: 100%;  margin-top: 100px; margin-right: 10px; margin-left: 50px;"></canvas>
              <canvas id="lineChart" style="width:100%; margin-top: 100px;margin-right: 10px; margin-left: 10px; "></canvas>
            </div>
          </div>
        </div>

    <!-- /#wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="../js/admin.js"></script>
  </body>
</html>