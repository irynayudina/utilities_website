<?php
   ini_set('display_errors', 1);
error_reporting(~0);
include_once 'db.php';
if(isset($_POST['submit']))
{    
    
     $mobile = $_POST['appartment_owner_idi']; 
     $city = $_POST['appartment_city_namei'];
     $street = $_POST['appartment_street_namei'];
     $building = $_POST['appartment_buildi'];
     $number = $_POST['appartment_numi'];
     $sql = "INSERT INTO `Appartment`(`city_id`, `street_id`, `building`, `id_owner`, `appartment_num`) 
     VALUES ('$city','$street','$building','$mobile','$number')";
     mysqli_query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
header("refresh:5; url=MainEditorPageAppartments.php");
?>