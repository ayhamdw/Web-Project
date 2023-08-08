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
    <!--Arabic Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Open+Sans:wght@300&family=Reem+Kufi+Fun:wght@400;500&family=Scheherazade+New:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Requests_page.css">
    <!--Icon Tab Link -->
    <link rel="icon" href="../imgs/icon tab3.jpg"/>
    <title>Requests page</title>
</head>
<body>
      

  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">الطلبات</a>
    </div>
  </nav>

  <div class="sidebar bg-white p-20 p-relative" >
    <h3 class=" txt-c mt-0">المتبرع</h3>
    <ul>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/MainPage.html">
                
                <i class="fa-solid fa-house-user"></i>
                <span class="hide-mobile">الرئيسية</span>
            </a>
        </li>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Blood_Donar_Setting.php">
                
                <i class="fa-solid fa-user"></i>
                <span class="hide-mobile">إعدادات الحساب</span>
            </a>
        </li>

        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Requests_page_patient.php">
                
                <i class="fa-solid fa-circle-info"></i>
                <span class="hide-mobile">الطلبات</span>
            </a>
        </li>

        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="#">
                
                <i class="fa-solid fa-file-signature"></i>
                <span class="hide-mobile">تواصل معنا</span>
            </a>
        </li>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/Donation_benefits.html">
                
                <i class="fa-solid fa-notes-medical"></i>
                <span class="hide-mobile">فوائد تبرع بالدم</span>
            </a>
        </li>
        
    </ul>
</div>



<!--cards-->
    <section class="page">
      <div class="card">
        <h1>اجمالي الطلبات</h1>
      <a href="total_req_patient.php" class="card__button">انقر لرؤية جميع الطلبات</a>
    </div>
    <div class="card">
      <h1>الطلبات الموافق عليها</h1>
    <a href="approved_reg_patient.php" class="card__button">انقر لرؤية جميع الطلبات</a>
  </div>
  <div class="card">
    <h1>الطلبات المرفوضة</h1>
  <a href="rejeccted_req_patient.php" class="card__button">انقر لرؤية جميع الطلبات</a>
</div>
      <div class="card">
        <h1>الطلبات المرسلة</h1>
      <a href="sent_req_patient.php" class="card__button">انقر لرؤية جميع الطلبات</a>
    </div>

      </section>

     
      <!--footer-->

>
 



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