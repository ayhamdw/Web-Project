<?php
    if(isset($_POST['phoneNumber']) && isset($_POST['DonorNmae']) ){
        $pNumber=$_POST['phoneNumber'];
        $dName = $_POST['DonorNmae'];
        $bType = $_POST['BloodType'];
        try{
            $db =new mysqli("localhost", "root" , "", "web_project");
            $qryStr =" INSERT INTO `donorreq`(`DName`, `BType`, `PHNumber`) VALUES ('$dName','$bType','$pNumber') ";
            $db->query($qryStr);
            $db->commit();
            $db->close();  
        }catch(Exception $e){

        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood_Donor</title>
    <link rel="stylesheet" href="../css/framework.css">
    <link rel="stylesheet" href="../css/Blood_Donor.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="../js/Blood_Donor.js"></script>

    <script>
        function solid(){
            document.getElementById('SNot').className="fa-solid fa-bell";
            
        }
    
        function normal(){
            document.getElementById('SNot').className="fa-regular fa-bell";
        }

    </script>

</head>
<body>
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative" >
            <h3 class=" txt-c mt-0">المتبرع</h3>
            <ul>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/Blood_Donor.html">
                        
                        <i class="fa-solid fa-suitcase-medical"></i>
                        <span class="hide-mobile">تبرع الآن</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/MainPage.html">
                        
                        <i class="fa-solid fa-house-user"></i>
                        <span class="hide-mobile">الرئيسية</span>
                    </a>
                </li>
                
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/Blood_Donar_Setting.html">
                        
                        <i class="fa-solid fa-gear"></i>
                        <span class="hide-mobile">إعدادات الحساب</span>
                    </a>
                </li>

                

                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/form_blood.html">
                        
                        <i class="fa-solid fa-file-signature"></i>
                        <span class="hide-mobile">اطلب دم</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/general_information.html">
                        
                        <i class="fa-solid fa-notes-medical"></i>
                        <span class="hide-mobile">فوائد التبرع بالدم</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <div class="content w-full">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                
                <div class="icons d-flex align-center">
                    <img src="../imgs/avatar.png" alt="">
                    <span  class="notification p-relative">
                        <i id="SNot" onmouseover="solid()" onmouseout="normal()" class="fa-regular fa-bell"></i>
                    </span>
                    
                </div>    
            </div>
            <!-- End Head -->
            <h1 class="p-relative">الرئيسية</h1>
            <div class="wrapper d-grid gap-20 block-mobile">
                <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
                    <div class="intro p-20 d-flex space-between bg-eee">
                        <div>
                            <h2 class="m-0">مرحبا</h2>
                            <p class="cp-gray mt-5 mr-10">شريف</p>
                        </div>
                        <img class="hide-mobile" src="../imgs/p11.png" alt="">
                    </div>
                    <img src="../imgs/avatar.png" alt="" class="avatar">
                    <div class="body txt-c d-flex p-20 mt-20 mb-20 ">
                        <div>شريف موافي <span class="d-block c-gray fs-14 mt-10 block-mobile">مطور </span></div>
                        <div>80 <span class="d-block c-gray fs-14 mt-10">المشاريع </span></div>
                        <div>$8450 <span class="d-block c-gray fs-14 mt-10">الارباح</span></div>
                    </div>
                    <a href="profile.html" class="visit d-block fs-14 rad-6 bg-blue c-white w-fit btn-shape">زيارة الحساب</a>
                </div>
                <!-- Start Request Donation -->
                
                <div class="quick-draft p-20 bg-white rad-10 ">
                    <h2 class="mt-0 mb-10 ">تقديم طلب تبرع</h2>
                    <p class="confirm mt-0 mb-20 c-gray fs-15">الرجاء التأكد من جميع البيانات قبل التأكيد</p>
                    <form action="Blood_Donor.php" method="post" >
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="DonorNmae" placeholder="الإسم بالكامل">
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="BloodType" placeholder="نوع الدم ( اختياري )">
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="number" name="phoneNumber" placeholder="رقم الهاتف">
                        
                        <!-- <textarea class=" d-block mb-20 w-full p-10 b-none bg-eee rad-6" placeholder="Your Though"></textarea> -->
                        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" method="post" type="submit" value="تأكيد الطلب">
                    </form>    
                </div>
                <!-- End Request Donation -->

            </div>
            <div class="projects p-20 bg-white rad-10 m-20">
                <h2 class="mt-0 mb-20">أخر التبرعات</h2>
                <div class="responsive-table">
                    <table class="fs-15 w-full" >
                        <thead>
                            <tr>
                                <td>الإسم</td>
                                <td>تاريخ اخر تبرع</td>
                                <td>مكان التبرع</td>
                                <td>نوع الدم</td>
                                <td>عدد مرات التبرع</td>
                                <td>حالة آخر تبرع</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>أحمد</td>
                                <td>10 May 2022</td>
                                <td>قلقيلية</td>
                                <td>AB-</td>
                                <td>4 مرات</td>
                                <td>
                                  <span class="label btn-shape bg-red c-white">فاشلة</span>
                                </td>
                              </tr>
                              <tr>
                                <td>ميساء</td>
                                <td>12 Oct 2021</td>
                                <td>نابلس</td>
                                <td>O-</td>
                                <td>5 مرات</td>
                                <td><span class="label btn-shape bg-red c-white">فاشلة</span></td>
                              </tr>
                              <tr>
                                <td>وسن</td>
                                <td>05 Sep 2021</td>
                                <td>طولكرم</td>
                                <td>B+</td>
                                <td>مرتين</td>
                                <td><span class="label btn-shape bg-green c-white">ناجحة</span></td>
                              </tr>
                              <tr>
                                <td>أيهم</td>
                                <td>22 May 2021</td>
                                <td>طوباس</td>
                                <td>A-</td>
                                <td>6 مرات</td>
                                <td><span class="label btn-shape bg-green c-white">ناجحة</span></td>
                              </tr>
                              <tr>
                                <td>شريف</td>
                                <td>24 May 2021</td>
                                <td>جنين</td>
                                <td>O+</td>
                                <td>مرة واحدة</td>
                                <td><span class="label btn-shape bg-red c-white">فاشلة</span></td>
                              </tr>
                              <tr>
                                <td>عبدالله</td>
                                <td>01 Mar 2021</td>
                                <td>أريحا</td>
                                <td>A+</td>
                                <td>ثلاث مرات</td>
                                <td><span class="label btn-shape bg-green c-white">ناجحة</span></td>
                              </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

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