
   <?php
    session_start();
    $un = $_SESSION['$username'];
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    $sqlQuery1 = "SELECT *  FROM `patients` where UserName= '".$un."'";
    $stmt1 = mysqli_query($conn, $sqlQuery1);
    $result = mysqli_fetch_assoc($stmt1);
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
    <link rel="stylesheet" href="../css/patient_page.css">
    <!--Icon Tab Link -->
    <link rel="icon" href="../imgs/icon tab3.jpg"/>
    <title>patient page</title>
</head>
<body>
  
    <!-- navbar patient -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      
        <!-- form-->
        <a href="form_blood.php" class="btn btn-dark">اطلب دم</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
       
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
            
              <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <!--Dropdown-->  
              المريض
              </button>
              
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="../html/MainPage.html"> الرئيسية </a></li>
                <li><a class="dropdown-item" href="Requests_page_patient.php"> الطلبات </a></li>
                <li><a class="dropdown-item" href="Blood_Donar_Setting.php"> اعدادات الحساب </a></li>
                <li><a class="dropdown-item" href="#">تواصل معنا </a></li>
                <li><a class="dropdown-item" href="#"> تسجيل خروج</a></li>
              </ul>
            </li>
          </ul>
        </div>
         
        <!-- Notifiction Icon-->
        
        <button type="button" class="navbar-icon_notifiction btn ">
          <span class="badge "> <i class="fa-solid fa-bell"></i>5</span>
          
        </button>
         
        
        <!-- Profile Icon-->
        <a class="navbar-icon_profile" href="#">
          <i class="fa-solid fa-user"></i>
        </a>
      </div>
    </nav>

    <!-- Information card-->

 <div class="container-fluid"> 
  <div class="container_sec1">
    <div class="page-content page-container" id="page-content">
      <div class="padding">
        <div class="row container d-flex justify-content-center">
  <div class="col-xl-6 col-md-12">
  <div class="card_inf user-card-full">
  <div class="row m-l-0 m-r-0">
  <div class="col-sm-4 bg-c-lite-green user-profile">
  <div class="card-block text-center text-white">
  <div class="m-b-25">
  <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
  </div>
  
  <h6 class="f-w-600" name="PNAME"> </h6>
  
   <!-- edit icon--> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
  </div>
  </div>
  <div class="col-sm-8">
   <div class="card-block">
   <h6 class="m-b-20 p-b-5 b-b-default f-w-600">بطاقة تعريفية</h6>
         <div class="row">
  <div class="col-sm-6">

  <p class="m-b-10 f-w-600"> البريد الاكتروني
  
  </p>

  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-sm-6">
  <p class="m-b-10 f-w-600">العمر

  </p>

  </div>
   </div>
   <br>
   <div class="row">
    <div class="col-sm-6">
    <p class="m-b-10 f-w-600">فئة الدم
    <br>
    
    </p>

    </div>
     </div>
  
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>                                                  
  </div>
  </div>
  <!--  card blood transfusion procedures -->
  
    <div class = container_card>
      <div class = card>
        <div class = image>
          <img src ="../imgs/btran.jpg" alt="blood transfusion procedures">
        </div>
        <div class = content>
          <h3>اجراءات نقل دم</h3>
          <p>نقل الدم (Transfusion) هو عملية نقل أو إعطاء الدم أو مكوناته من شخص إلى شخص آخر.إليك بعض الإجراءات الأساسية المتبعة في عملية نقل الدم
          </p>
<a href="">تعرف عليها</a>
            <i class="fa-solid fa-arrow-left"> </i>
          </a>
        
        </div>
      </div>    
    </div>
  </div> 
  
<!-- Compatible Blood Type Donors -->

<div class="table_section">
  <h2 class="mt-0 mb-20">فئات الدم وتوافقهم</h2>
  <div class="table_blood">
    <table >
      <thead >
      <tr">
        <td>فئة الدم</td>
        <td>لمن يتبرع</td>
        <td>يتلقى من</td>
      </tr>
</thead>

<tbody>
  <tr class="elm1">
    <td>A+</td>
      <td>A+ AB+</td>
      <td>O+ A+ B+ AB+</td>
  </tr>
 
  <tr class="elm2">
    <td>O+</td>
      <td>O+ A+ B+ AB+</td>
      <td>O+ O-</td>
  </tr>
  
  <tr class="elm3">
    <td>B+</td>
      <td>B+ AB+</td>
      <td>B+ B- O+ O-</td>
  </tr>

  <tr class="elm4">
    <td>AB+</td>
      <td>AB+</td>
      <td>Everyone</td>
  </tr>

  <tr class="elm5">
    <td>A-</td>
      <td>A+ A- AB+ AB-</td>
      <td>A- O-</td>
  </tr>

  <tr class="elm6">
    <td>O-</td>
      <td>Everyone</td>
      <td>O-</td>
  </tr>

  <tr class="elm7">
    <td>B-</td>
      <td>B+ B- AB+ AB-</td>
      <td>B- O-</td>
  </tr>

  <tr class="elm8">
    <td>AB-</td>
      <td>AB+ AB-</td>
      <td>AB- A- B- O-</td>
  </tr>
</tbody>
</table>
  </div>
</div>
  
<!-- registry Transfer -->

<div class="registry_section">
  <h2 class="mt-0 mb-20">سجل نقل الدم</h2>
  <div class="registry_Transfer_table">
    <table >
      <thead >
      <tr">
        <td>التاريخ</td>
        <td>فئة الدم</td>
        <td>عدد الوحدات</td>
      </tr>
</thead>

<tbody>
  <tr class="elm1">
    <td>7/7/2023</td>
      <td>A+</td>
      <td>4</td>
  </tr>
 
  <tr class="elm2">
    <td>18/7/2023</td>
      <td>AB+</td>
      <td>7</td>
  </tr class="elm1">
  
  <tr class="elm3">
    <td>25/5/2023</td>
      <td>O-</td>
      <td>1</td>
  </tr>

  <tr class="elm4">
    <td>12/4/2023</td>
      <td>B-</td>
      <td>3</td>
  </tr>

  <tr class="elm5">
    <td>18/3/2023</td>
      <td>B+</td>
      <td>2</td>
  </tr>

  <tr class="elm6">
    <td>22/6/2023</td>
      <td>O+</td>
      <td>1</td>
  </tr>

  <tr class="elm7">
    <td>30/1/2023</td>
      <td>B-</td>
      <td>5</td>
  </tr>

  <tr class="elm8">
    <td>6/5/2023</td>
      <td>AB-</td>
      <td>8</td>
  </tr>
</tbody>
</table>
  </div>
  <!-- pagination -->
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>



<!--footer-->

<div class="footer">
  
</div>

 </div> <!--end container-->
   
 
 

 
<script src="../js/bootstrap.bundle.min.js"></script>


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

</body>
</html>