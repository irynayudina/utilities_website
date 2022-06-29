<?php $servername='sql108.byethost32.com';
$username='b32_31818718';
$password='fxmj2hyq';
$dbname = "b32_31818718_firstlabdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$appId = $mobile = $city = $street = $building = $number = "";
$appId_err = $mobile_err = $city_err = $street_err = $building_err = $number_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){   
    if(empty(trim($_POST["appartment_idu"]))){
        $appId_err = "Please enter phone.";
    } else{
        $appId = $_POST['appartment_idu'];
    }
    if(empty(trim($_POST["appartment_owner_idu"]))){
        $mobile_err = "Please enter phone.";
    } else{
        $mobile = $_POST['appartment_owner_idu']; 
    }
    if(empty(trim($_POST["appartment_cityu"]))){
        $city_err = "Please enter phone.";
    } else{
        $city = $_POST['appartment_cityu'];
    }
    if(empty(trim($_POST["appartment_streetu"]))){
        $street_err = "Please enter phone.";
    } else{
        $street = $_POST['appartment_streetu'];
    }
    if(empty(trim($_POST["appartment_buildingu"]))){
        $building_err = "Please enter phone.";
    } else{
        $building = $_POST['appartment_buildingu'];
    }
    if(empty(trim($_POST["appartment_numu"]))){
        $number_err = "Please enter phone.";
    } else{
        $number = $_POST['appartment_numu'];
    }
     $sql = "UPDATE Appartment
     SET city_id = city_id";
    if(empty($mobile_err)){
        $sql .= ", id_owner = '$mobile'";
    }
    if(empty($city_err)){
        $sql .= ", city_id = '$city'";
    }
    if(empty($street_err)){
        $sql .= ", street_id = '$street'";
    }
    if(empty($building_err)){
        $sql .= ", building = '$building' ";
    }
    if(empty($number_err)){
        $sql .= ", appartment_num = '$number' ";
    }
    $sql .= " WHERE id = '$appId'; ";
}
$result = $conn->query($sql);?>