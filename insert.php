<?php
   ini_set('display_errors', 1);
error_reporting(~0);
include_once 'db.php';
if(isset($_POST['submit']))
{    
    
     $mobile = $_POST['mobile']; 
     $forename = $_POST['forename'];
     $name = $_POST['name'];
     $middlename = $_POST['middlename'];
     $password = $_POST['password'];
     $userRole = $_POST['userRole'];
     $sql = "";
     if($userRole  == 'Editor'){
        $sql = "INSERT INTO Editor (phone,forename,name,middlename,password)
        VALUES ('$mobile','$forename','$name','$middlename','$password')";
     }
     if($userRole  == 'Worker'){
        $sql = "INSERT INTO Worker (phone,forename,name,middlename,password)
        VALUES ('$mobile','$forename','$name','$middlename','$password')";
     }
     if($userRole  == 'Owner'){
        $sql = "INSERT INTO Owner (phone,forename,name,middlename,password)
        VALUES ('$mobile','$forename','$name','$middlename','$password')";
     }
     mysql_query("SET NAMES cp1251");
     mysql_query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

header("refresh:5; url=MainEditorPage.php");
?>