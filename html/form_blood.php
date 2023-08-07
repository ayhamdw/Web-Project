<?php
if (isset($_POST["blood_type"])) {
  $btype = $_POST["blood_type"];
  $number_of_unit = $_POST["number_of_unit"];
  $idnumber = $_POST["number_id"];
  $result = "";
      $sqlQuery = "INSERT INTO `patientreq`(`blood_type`,`number_of_unit`,`number_id`) VALUES ('$btype','$number_of_unit','$idnumber')";
      $conn = new mysqli("localhost", "root" ,"", "web_project");
      $conn->query($sqlQuery);
      $sqlQuery = "SELECT * FROM `patientreq`";
      $result = $conn->query($sqlQuery);              
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Arabic Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Open+Sans:wght@300&family=Reem+Kufi+Fun:wght@400;500&family=Scheherazade+New:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../imgs/icon tab3.jpg"/>
    <!--Main Css File-->
    <link rel="stylesheet" href="../css/form_blood.css">
    
</head>
<body>
   
       
            <nav class="navbar ">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">اطلب دم</a>
              </div>
            </nav>
<!-- form-->
<form action="form_blood.php" method="post">
<div class="container d-flex justify-content-center ">
                <div class="card">
                    <a class="singup">اطلب دم</a>
                    <div class="inputBox">
                        <input type="text"  name="blood_type" required="required">
                        <span >فئة الدم</span>
                    </div>
        
                    <div class="inputBox">
                        <input type="text" name="number_of_unit" required="required">
                        <span>عدد الوحدات</span>
                    </div>
        
                    <div class="inputBox">
                        <input type="text"  name="number_id" required="required">
                       <span> رقم الهوية</span>
                    </div>
        
                  <!--button sumbit-->
                  <div class="container">
                    <button id="btn">
                        <p id="btnText">تم</p>
                        <div class="check-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </div>
                    </button>
                </div>
                <script type="text/javascript">
                    const btn = document.querySelector("#btn");
                    const btnText = document.querySelector("#btnText");
            
                    btn.onclick = () => {
                        btnText.innerHTML = "بالشفاء";
                        btn.classList.add("active");
                    };
                </script>
                </div>
            </div>
</form>
            
            <div class="footer">
                <div class="container_footer">
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
    
    

    <script src="../js/bootstrap.bundle.min.js" ></script>
</body>
</html>