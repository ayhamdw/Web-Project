<?php
session_start();
if (isset($_POST['usernameUp']) && isset($_POST['passwordUp'])) {
  $username = $_POST['usernameUp'];
  $_SESSION['$username'] = $_POST['usernameUp'];
  $password = $_POST['passwordUp'];
  $hashPassword = sha1($password);
  $flag = 0; // 1 for donar, 2 for patient , 3 for admin

    $conn = mysqli_connect("localhost", "root", "", "web_project");

    // Use prepared statements to prevent SQL injection
    $sqlQuery = "SELECT `UserName`, `Password` FROM `donars` WHERE `UserName` = ?";
    $stmt = mysqli_prepare($conn, $sqlQuery);

    mysqli_stmt_bind_param($stmt, "s", $username );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);

    if ($rowCount > 0) {
        // Fetch the password hash from the database
        mysqli_stmt_bind_result($stmt, $dbUsername, $dbPassword);
        mysqli_stmt_fetch($stmt);

        // Verify the password
      if ($hashPassword == $dbPassword) {
          // Password is correct, proceed to the next page (admin.php)
          $flag = 1; // donar
      } else {
          echo "<script>alert('Wrong Password')</script>";
      }
    } else {
    $sqlQuery = "SELECT `UserName`, `Password` FROM `patients` WHERE `UserName` = ?";
    $stmt = mysqli_prepare($conn, $sqlQuery);

    mysqli_stmt_bind_param($stmt, "s", $username );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0) {
      // Fetch the password hash from the database
      mysqli_stmt_bind_result($stmt, $dbUsername, $dbPassword);
      mysqli_stmt_fetch($stmt);

      // Verify the password
      if ($hashPassword == $dbPassword) {
        // Password is correct, proceed to the next page (admin.php)
        $flag = 2; // donar
    } else {
        echo "<script>alert('Wrong Password')</script>";
    }
  } else {
    $sqlQuery = "SELECT `UserName`, `Password` FROM `admin` WHERE `UserName` = ?";
    $stmt = mysqli_prepare($conn, $sqlQuery);

    mysqli_stmt_bind_param($stmt, "s", $username );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rowCount = mysqli_stmt_num_rows($stmt);
    if ($rowCount > 0) {
      // Fetch the password hash from the database
      mysqli_stmt_bind_result($stmt, $dbUsername, $dbPassword);
      mysqli_stmt_fetch($stmt);

      // Verify the password
      if ($hashPassword == $dbPassword) {
        // Password is correct, proceed to the next page (admin.php)
        $flag = 3; // admin
    } else {
        echo "<script>alert('Wrong Password')</script>";
    }
  } else {
    echo "<script>alert('Try Again')</script>";
  }
  }
    }

    if ($flag == 1) {
      $sqlQuery1 = "SELECT *  FROM `donars` WHERE `UserName` = '".$username."'";
      $stmt1 = mysqli_query($conn, $sqlQuery1);
      foreach($stmt1 as $row){
        $FName = $row['FirstName'];
      }
      header("Location: Blood_Donor.php");
    } 
    elseif ($flag == 2) {
      // $username
      // $password
      header("Location: patient_page.php");
    }
    elseif ($flag == 3) {
      // $username
      // $password
      header("Location: admin.php");
    }
    else {
      header("Location: signin.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<?php
if (isset($_POST['firstName'])) {
    $type = $_POST['type'];
    // Properly escape the $type variable to prevent XSS
    $type = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');

    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $email = $_POST['email'];
    $username = $_POST['userName'];
    $birthday = $_POST['birthday'];
    $bloodType = $_POST['bloodType'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $phone = $_POST['phoneNumber'];

    if ($type == 'Donar') {
        // Establish the database connection using mysqli_connect
        $conn = mysqli_connect("localhost", "root", "", "web_project");

        // Use prepared statements to prevent SQL injection
        $sqlQuery = "SELECT `UserName` FROM `donars` WHERE `UserName` = ?";
        $stmt = mysqli_prepare($conn, $sqlQuery);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_close($stmt);

        if ($rowCount == 0) {
            // Use password_hash to securely hash the password
            $hashedPassword = sha1($password);
            // Use prepared statements for the INSERT query
            $sqlQuery = "INSERT INTO `donars` (`FirstName`, `SecondName`, `UserName`, `Email`, `City`, `PhoneNumber`, `BirthDate`, `BloodType`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sqlQuery);
            mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $secondName, $username, $email, $city, $phone, $birthday, $bloodType, $hashedPassword);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
        }

        mysqli_close($conn);
    }

    elseif ($type == 'Patient') {
      $conn = mysqli_connect("localhost", "root", "", "web_project");

      // Use prepared statements to prevent SQL injection
      $sqlQuery = "SELECT `UserName` FROM `patients` WHERE `UserName` = ?";
      $stmt = mysqli_prepare($conn, $sqlQuery);
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $rowCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);

      if ($rowCount == 0) {
          // Use password_hash to securely hash the password
          $hashedPassword = sha1($password);
          // Use prepared statements for the INSERT query
          $sqlQuery = "INSERT INTO `patients` (`FirstName`, `SecondName`, `UserName`, `Email`, `City`, `PhoneNumber`, `BirthDate`, `BloodType`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $sqlQuery);
          mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $secondName, $username, $email, $city, $phone, $birthday, $bloodType, $hashedPassword);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);
      } else {
      }

      mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signin page</title>
    <!-- English Font-->
    <link href="https://fonts.googleapis.com/css2?family=Caladea:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/singin.css">
</head>
<body>
  <div class="form">
    <ul class="tab-group">
      <li class="tab active"><a href="#signup" style="border-radius: 15px!important;margin-right:8x;">Sign Up</a></li>
      <li class="tab"><a href="#login" style="border-radius: 15px!important;margin-left:8px;">Log In</a></li>
    </ul>
    <div class="tab-content">
      <div id="signup">
        <h1>Register</h1>
        <form method="POST" id= "formId" action="signin.php">
          <div class="top-row">
            <div class="field-wrap">
              <input type="text" id= "FirstName" name = "firstName" required placeholder="First Name" />
            </div>
            <div class="field-wrap">
              <input type="text" id= "SecondName" name = "secondName" required placeholder="Last Name" />
            </div>
          </div>
          <div class="field-wrap">
            <input type="email" id= "Email" name = "email" required placeholder="Email Address"/>
          </div>
          <div class="field-wrap">
            <input type="text" id= "usernameIn" name = "userName" required placeholder="Username" />
          </div>
          <div class="field-wrap">
            <input type="text" id= "City" name ="city" required placeholder="City" />
          </div>
          <div class="field-wrap">
            <input type="text" id= "PhoneNumber" name = "phoneNumber" required placeholder="Phone Number" />
          </div>
          <div class="field-wrap">
            <input type="text" id= "City" name ="city" required placeholder="ID_number" />
          </div>
          <div class="field-wrap">
            <input type="password" name = "password" id= "passwordIn" required placeholder="Password" />
          </div>
          <div class="field-wrap">
            <input type="password"  required placeholder="Confirm Password" />
          </div>
          <div style="margin-bottom: 30px;">
            <select class="form-select" aria-label="Default select example" name = "bloodType" style=" color: black;border-radius: 3px;background-color: transparent; border: 1px solid rgb(188, 55 , 55); width: 100%; height: 35px;" name="bloodType" id="bloodType">
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
          </div>
          <div class="field-wrap">
            <input type="date" name = "birthday"  id= "Birthday" required placeholder="Birthday" />
          </div>
          <div class="outer">
            <div>
              <label for="" style="color:white">Donar</label>
              <input type="radio" name = "type" value="Donar" style="border: 0px; width: 50%; height: 1.5em;">
            </div>
            <div>
              <label for="" style="color:white">Patient</label>
              <input type="radio" name ="type" value="Patient" style="border: 0px; width: 50%; height: 1.5em;">
            </div>
          </div>
          <button type="submit" class="button button-block" id = "submitButton" >Sign Up</button>
        </form>
      </div>
      <div id="login">
        <h1>Welcome Back!</h1>
        <form method="POST" id="formId1" action="signin.php">
          <div class="field-wrap">
            <input type="text" id="usernameUp" name="usernameUp" required placeholder="username" />
          </div>
          <div class="field-wrap">
            <input type="password" id="passwordUp" name="passwordUp" required placeholder="Password" />
          </div>
          <button type="submit" class="button button-block" id="submitButton">Log In</button>
        </form>
      </div>
    </div>
  </div> 
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/signin.js"></script>
</body>
</html>
