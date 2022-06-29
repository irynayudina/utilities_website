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
    if(empty(trim($_POST["oidd"]))){
        $appId_err = "Please enter phone.";
    } else{
        $appId = $_POST['oidd'];
    }
     $sql = "";
    if(empty($appId_err)){
        $sql = "DELETE FROM Owner WHERE phone = '$appId' ";
    }
}
$result = $conn->query($sql);
header("refresh:3; url=MainEditorPageOwners.php")
?>