<?php
$conn = new mysqli("localhost", "root", "", "web_project");
$sqlQuery = "SELECT * FROM `patientreq` WHERE accept_status ='رفض' ";
$result = mysqli_query($conn, $sqlQuery);
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
    <link rel="stylesheet" href="../css/rejected_req.css">
    <!--Icon Tab Link -->
    <link rel="icon" href="../imgs/icon tab3.jpg"/>
    <title>Rejected Request</title>
</head>
<body>

<div class="container-fluid">
    <!--NAV-->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">الطلبات المرفوضة</a>
        </div>
      </nav>
<!--TABLE-->
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
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Extract data from the current row
                            $req_id = $row["requestID"];
                            $btype = $row["blood_type"];
                            $number_of_unit = $row["number_of_unit"];
                            $status = $row["accept_status"];
                        ?>
                            <tr class="elm1">
                                <td><?php echo $req_id; ?></td>
                                <td><?php echo $btype; ?></td>
                                <td><?php echo $number_of_unit; ?></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
        
      </tbody>
      </table>
        </div>

        <!--footer-->
<div class="footer">
  <div class="container">
      <img src="/imgs/logo.png" alt="">

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