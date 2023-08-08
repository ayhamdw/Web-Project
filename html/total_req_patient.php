<?php
if (isset($_POST["blood_type"])) {
$conn = new mysqli("localhost", "root" ,"", "web_project");
$sqlQuery = " SELECT * FROM `patientreq`";
$result = mysqli_query($conn , $sqlQuery);
$get = mysqli_fetch_assoc($result);

    $req_id =$get["number_reg"];
    $btype = $get["blood_type"];
    $number_of_unit =$get["number_of_unit"];
    $status = $get["accept_status"];
}
?>



<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Arabic Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Open+Sans:wght@300&family=Reem+Kufi+Fun:wght@400;500&family=Scheherazade+New:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Main Css File-->
    <link rel="stylesheet" href="../css/total_req.css">
    <!--Icon Tab Link -->
    <link rel="icon" href="../imgs/icon tab3.jpg"/>
    <title>Total Request</title>
</head>
<body>

<div class="container-fluid">
    <!--NAV-->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">اجمالي الطلبات</a>
        </div>
      </nav>
<!--TABLE-->
<form action="total_req.php" method="post">
<div class="registry_section">
        
        <div class="registry_Transfer_table">
          <table >
            <thead >
            <tr">
              <td name="number_reg">رقم الطلب</td>
              <td name="blood_type">فئة الدم</td>
              <td name="number_of_unit">عدد الوحدات</td>
              <td name="accept_status">حالة الطلب</td>
            </tr>
      </thead>
      
      <tbody>
   <?php
                      
  $conn = new mysqli("localhost", "root" , "", "web_project");
                      $sqlQuery = " SELECT * FROM `patientreq` ";
                      $result = mysqli_query($conn , $sqlQuery);
                      while ($get = mysqli_fetch_assoc($result)) {
                     
                     ?> 
                        <tr class="elm1">
                          <td name="number_reg"> <?php echo $get["number_reg"];?></td>
                            <td name="blood_type"> <?php echo $get["blood_type"];?></td>
                            <td name="number_of_unit"> <?php echo $get["number_of_unit"];?></td>
                            <td name="accept_status"> <?php echo $get["accept_status"];?></td>
                        </tr>
       
        <?php
                      }
                      
                    ?>
                    
                    
        
      </tbody>
      </table>
        </div>
</form>
    
                    
        <!--footer-->

<div class="footer">
  <div class="container">
      <img src="../imgs/logo.png" alt="">

      <p>مركز <span>قدس</span> للتبرع بالدم</p>
      <div class="social-icons">

          <a href="#"><i class="fa-brands fa-facebook fa-2xl"></i></a>
          <a href="#"><i class="fa-brands fa-twitter fa-2xl"></i></a>
          <a href="#"><i class="fa-brands fa-instagram fa-2xl"></i></a>
          <a href="#"><i class="fa-brands fa-youtube fa-2xl"></i></a>
      </div>
      
      <p class="copyright">
          &copy;
          2023
          جميع الحقوق محفوظة لدى مركز 
          <span>قدس</span>
          للتبرع بالدم
          <!-- <p>مركز <span>قدس</span> للتبرع بالدم</p> -->
      </p>
  </div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>