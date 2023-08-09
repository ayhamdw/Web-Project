<?php
session_start();
if (isset($_POST["blood_type"])) {
    $username = $_SESSION['usernameSession'];
    $btype = $_POST["blood_type"];
    $number_of_unit = $_POST["number_of_unit"];
    $requestID = $_POST["requestID"];
    $sqlQuery = "INSERT INTO `donorreq`(`requestID`, `DName`, `BType`, `donarUserName`) VALUES ('$requestID','$btype','$number_of_unit','$username')";
    $conn = new mysqli("localhost", "root" ,"", "web_project");
    $conn->query($sqlQuery);          
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


        function setUName(){
            alert (getUName());
        }
        
        setUName();
    </script>

    <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $un = $_SESSION['$username'];
    $conn = mysqli_connect("localhost", "root", "", "web_project");
    $sqlQuery1 = "SELECT *  FROM `donars` where UserName= '".$un."'";
    $stmt1 = mysqli_query($conn, $sqlQuery1);
    $result = mysqli_fetch_assoc($stmt1);
    ?>

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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="../html/MainPage.html">
                        
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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="Requests_page_donor.php">
                        
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
                            <p id="uName" class="cp-gray mt-5 mr-10"><?php echo $result['FirstName'] ?></p>
                        </div>
                        <img class="hide-mobile" src="../imgs/p11.png" alt="">
                    </div>
                    <img src="../imgs/avatar.png" alt="" class="avatar">
                    <div class="body txt-c d-flex p-20 mt-20 mb-20 ">
                        <div><b>الإسم</b><span class="d-block c-gray fs-14 mt-10 block-mobile"><?php echo $result['FirstName']." ". $result['SecondName'] ?></span></div>
                        <div><b>رقم الهاتف</b><span class="d-block c-gray fs-14 mt-10"><?php echo $result['PhoneNumber']?></span></div>
                        <div><b>زمرة الدم</b><span class="d-block c-gray fs-14 mt-10"></span><?php echo $result['BloodType']?></div>
                        <div><b>Username</b><span class="d-block c-gray fs-14 mt-10"></span><?php echo $result['UserName']?></div>
                    </div>
                    <!-- <a href="profile.html" class="visit d-block fs-14 rad-6 bg-blue c-white w-fit btn-shape">زيارة الحساب</a> -->
                </div>
                <!-- Start Request Donation -->
                
                <div class="quick-draft p-20 bg-white rad-10 ">
                    <h2 class="mt-0 mb-10 ">تقديم طلب تبرع</h2>
                    <p class="confirm mt-0 mb-20 c-gray fs-15">الرجاء التأكد من جميع البيانات قبل التأكيد</p>
                    <form action="Blood_Donor.php" method="post" >
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="requestID" placeholder="رقم الطلب">                        
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="blood_type" placeholder="فئة الدم">
                        <input class="name-input d-block mb-20 w-full p-10 b-none bg-eee rad-6" type="text" name="number_of_unit" placeholder="عدد الوحدات">                        
                        <!-- <textarea class=" d-block mb-20 w-full p-10 b-none bg-eee rad-6" placeholder="Your Though"></textarea> -->
                        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" method="post" type="submit" value="تأكيد الطلب">
                    </form>    
                </div>
                <!-- End Request Donation -->

<!-- ======= -->
    </form>

            </div>
            <div class="projects p-20 bg-white rad-10 m-20">
                <h2 class="mt-0 mb-20">أخر التبرعات</h2>
                <div class="responsive-table">
                    
                    <table class="fs-15 w-full" id="deleteTable"  >
                        <thead>
                            <tr>
                                <td>رقم الطلب</td>
                                <td>الإسم</td>
                                <td>مكان التبرع</td>
                                <td>نوع الدم</td>
                                <td>حالة التبرع</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_POST["blood_type"])) {
                            
                            $conn = new mysqli("localhost", "root" , "", "web_project");
                            $sqlQuery = "SELECT donorreq.requestID  , donars.FirstName , donars.SecondName , donars.City , donorreq.DName , donorreq.Status FROM donars , donorreq WHERE donorreq.donarUserName =  '$username' ";
                            $result = mysqli_query($conn , $sqlQuery);

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                            <tr>
                                <td><?php echo $row['requestID'] ?></td>
                                <td><?php echo $row['FirstName']." ". $row['SecondName']?></td>
                                <td><?php echo $row['City']?></td>
                                <td><?php echo $row['DName']?></td>
                                <?php
                                if ( $row['Status'] == 'Waiting' ) {
                                    echo '<td><span class="label btn-shape bg-blue c-white">'.$row['Status'].'</span></td>';
                                }
                                elseif ( $row['Status'] == 'Accept' ) {
                                    echo '<td><span class="label btn-shape bg-green c-white">'.$row['Status'].'</span></td>';
                                }
                                elseif ( $row['Status'] == 'Decline' ) {
                                    echo '<td><span class="label btn-shape bg-red c-white">'.$row['Status'].'</span></td>';
                                }
                                ?>
                              </tr>
                            <?php
                                }
                            }
                            ?>
                           
                        
                        
                            
                      </tbody>
                    </table>
                </div>
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
                <!-- <p>مركز <span>قدس</span> للتبرع بالدم</p> -->
            </p>
        </div>
    </div>
   
</body>
</html>