<?php

    session_start();
    $un = $_SESSION['$username'];
    $conn = new mysqli("localhost", "root" , "", "web_project");
    $sqlQuery = " SELECT * FROM `donars` where UserName='".$un."'";
    $stmt = mysqli_prepare($conn, $sqlQuery);
    $result = mysqli_query($conn , $sqlQuery);
    $row = mysqli_fetch_assoc($result);
    $firstName = $row["FirstName"];
    $secondName = $row["SecondName"];
    $Email1 = $row["Email"];
    // $password = $row["Password"];

    
    ?>
    <?php
    
    if ( isset($_POST['passName'])){ 
        $password = $_POST['passName'];
        // $hashPassword = md5($password);
        // $sqlQuery = " SELECT `Password` FROM `donars` where UserName='".$un."'";
        // $stmt = mysqli_prepare($conn, $sqlQuery);
        // $rowCount = mysqli_stmt_num_rows($stmt);
        // if ($rowCount > 0) {
            // mysqli_stmt_bind_result($stmt,$dbPassword);
            // mysqli_stmt_fetch($stmt);
            // if ($row["Password"] == sha1($_POST['PassName'])) {
                $fname = $_POST["FName"];
                $secondName = $_POST["SName"];
                $e = $_POST['email'];
                $sqlQuery = "UPDATE `donars` SET `FirstName`='$fname',`SecondName`='$secondName' , `Email`='$e' where `UserName`='".$un."'";
                $conn->query($sqlQuery);
            // }
            // else{
            //     echo '<script>alert("Wrong Password Please Try Again")</script>';
        //     } 
        // }
    }
    // $conn = new mysqli("localhost", "root" , "", "web_project");

    // if ( isset($_POST['email'])){ 
    //     // $e = $_POST['email'];
    //     $sqlQuery = "UPDATE `donars` SET `Email`='$e' where `UserName`='".$un."'";
    //     $conn->query($sqlQuery);

    // }


        

    

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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/Blood_Donor.php">
                        
                        <i class="fa-solid fa-suitcase-medical"></i>
                        <span class="hide-mobile">تبرع الآن</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/MainPage.php">
                        
                        <i class="fa-solid fa-house-user"></i>
                        <span class="hide-mobile">الرئيسية</span>
                    </a>
                </li>
                
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Blood_Donar_Setting.php">
                        
                        <i class="fa-solid fa-gear"></i>
                        <span class="hide-mobile">إعدادات الحساب</span>
                    </a>
                </li>

                

                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="/html/patient_page.html">
                        
                        <i class="fa-solid fa-file-signature"></i>
                        <span class="hide-mobile">الطلبات</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/general_information.php">
                        
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
            <h1 class="p-relative">الإعدادات</h1>
            <div class="settingBD-page m-20 d-grid gap-20">
                <!-- Start Setting box -->
                
                <div class="p-20 bg-white rad-10">
                    <h2 class="CP mt-0 mb-10">تعديل الاسم</h2>
                    <p class="mt-0 mb-20 c-grey fs-15">تعديل البيانات الخاصة بك</p>
                    <div class="mb-15 between-flex">
                        
                        
                    </div>
                    <form action="Blood_Donar_Setting.php" method="post" >
                        <span>ادخل الاسم الاول الجديد</span>
                        <input value="<?php echo $firstName ?>" id="FName" name="FName" class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="الاسم الاول">
                        <span>ادخل الاسم الاخير الجديد</span>
                        <input value="<?php echo $secondName ?>" id="LName" name="SName" class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="الاسم الاخير">
                        <span>الرجاء ادخال كلمة المرور لتأكيد العملية</span>
                        <input id="passName" name="passName" class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="كلمة المرور">
                        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="تأكيد">
                    </form>
                    <!-- <textarea class="close-message p-10 rad-6 d-block w-full" placeholder="الرجاء تزويدنا برأيك حول استخدامك للموقع"></textarea> -->
                
                </div>
                <div class="p-20 bg-white rad-10">
                    <h2 class="CP mt-0 mb-10">تعديل كلمة المرور</h2>
                    <p class="mt-0 mb-20 c-grey fs-15">يمكنك تعديل كلمة المرور من خلال هذه اللوحة</p>
                    <div class="mb-15 between-flex">
                        <div>
                            <span>ادخل كلمة المرور القديمة</span>
                        </div>
                        
                    </div>
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="كلمة المرور القديمة">
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="كلمة المرور الجديدة
                    ">
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="تأكيد كلمة المرور الجديدة">
                    <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="تأكيد">
                    <!-- <span>الرجاء ادخال كلمة المرور لتأكيد العملية</span>
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="كلمة المرور">
                     -->
                    <!-- <textarea class="close-message p-10 rad-6 d-block w-full" placeholder="الرجاء تزويدنا برأيك حول استخدامك للموقع"></textarea> -->
                
                </div>

                <div class="p-20 bg-white rad-10">
                    <h2 class="CP mt-0 mb-10">تعديل البريد الإلكتروني</h2>
                    <!-- <p class="mt-0 mb-20 c-grey fs-15">تعديل البيانات الخاصة بك</p> -->
                    <div class="mb-15 between-flex">
                        <div>
                            <span>قم بتعديل البريد الالكتروني من هنا</span>
                            

                        </div>
                        
                        
                    </div>
                    <!-- <form action="Blood_Donar_Setting.php" method="get" > -->
                    <input id="email" name="email" value="<?php echo $Email1 ?>" class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="example@gmail.com">
                    <!-- <span>الرجاء ادخال كلمة المرور لتأكيد العملية</span>
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="password" placeholder="كلمة المرور">
                    <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="ارسل رمز التأكيد">
                    <span>ادخل رمز التأكيد</span>
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="رمز التأكيد">
                    <span>ادخل البريد الالكتروني الجديد</span>
                    <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" placeholder="example@gmail.com"> -->
                    
                    
                    <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="تأكيد">
                    <!-- </form> -->
                    <!-- <textarea class="close-message p-10 rad-6 d-block w-full" placeholder="الرجاء تزويدنا برأيك حول استخدامك للموقع"></textarea> -->
                
                </div>

                <div class="p-20 bg-white rad-10">
                    <h2 class="CP mt-0 mb-10">رأي المستخدمين</h2>
                    <!-- <p class="mt-0 mb-20 c-grey fs-15">تعديل البيانات الخاصة بك</p> -->
                    <div class="mb-15 between-flex">
                        <div>
                            <!-- <span>لوحة التحكم</span> -->
                            <!-- <p class="c-grey mt-5 mb-0 fs-13">يمكنك زيارة جميع فروعنا في الوطن للتبرع بالدم</p> -->
                        
                        </div>
                        <!-- <div>
                            <label>
                                <input class="toggle-checkbox" type="checkbox" >
                                <div class="toggle-switch"></div>
                            </label>
                        </div> -->
                    </div>
                    <textarea class="close-message p-10 rad-6 d-block w-full mb-10" placeholder="الرجاء تزويدنا برأيك حول استخدامك للموقع"></textarea>
                    <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="تأكيد">

                </div>
                
                <!-- End Setting box -->
                
            </div>
        </div>
    </div>

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
            </p>
        </div>
    </div>
</body>
</html>


<!-- Shareef -->