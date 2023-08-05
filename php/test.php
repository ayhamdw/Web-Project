<?php
    // assume we have Donar
    $flag = 0;
    if (isset($_POST['firstName'])) {
        $type = $_POST['type'];
        $firstName = $_post['firstName'];
        $secondName = $_post['secondName'];
        $email = $_post['email'];
        $username = $_post['userName'];
        $birthday = $_post['birthday'];
        $bloodType = $_post['bloodType'];
        $password = $_post['password'];
        $city = $_post['city'];
        $phone = $_post['phoneNumber'];
        $password = $_post['firstName'];
        if ($type == 'Donar'){
            $conn = mysqli("localhost" , "root", "" , "web_project");
            $sqlQuery = "SELECT `UserName` FROM `donars` "; 
            $result = mysqli_query($conn , $sqlQuery);
            while ($row = mysqli_fetch_assoc($result)) {
        if ($row['UserName'] == $username ){
            $flag = 1;
            break;
        }
    }
    if ($flag == 0) {
        $sqlQuery = "INSERT INTO `donars` (`FirstName`, `SecondName`, `UserName`, `Email`, `City`, `PhoneNumber`, `BirthDate`, `BloodType`, `Password`) VALUES ('$firstName', '$secondName', '$username', '$email', '$city', '$phone', '$birthday', '$bloodType', SHA1($password))";
        $conn = new mysqli("localhost", "root" , "", "web_project");
        $conn->query($sqlQuery);
    }
    elseif (flag == 1) {
        echo "No we cant add it";
    }
}
}
?>