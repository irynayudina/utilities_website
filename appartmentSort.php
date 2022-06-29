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
    if(empty(trim($_POST["appartment_id"]))){
        $appId_err = "Please enter phone.";
    } else{
        $appId = $_POST['appartment_id'];
    }
    if(empty(trim($_POST["appartment_owner_id"]))){
        $mobile_err = "Please enter phone.";
    } else{
        $mobile = $_POST['appartment_owner_id']; 
    }
    if(empty(trim($_POST["appartment_city"]))){
        $city_err = "Please enter phone.";
    } else{
        $city = $_POST['appartment_city'];
    }
    if(empty(trim($_POST["appartment_street"]))){
        $street_err = "Please enter phone.";
    } else{
        $street = $_POST['appartment_street'];
    }
    if(empty(trim($_POST["appartment_building"]))){
        $building_err = "Please enter phone.";
    } else{
        $building = $_POST['appartment_building'];
    }
    if(empty(trim($_POST["appartment_num"]))){
        $number_err = "Please enter phone.";
    } else{
        $number = $_POST['appartment_num'];
    }
     $sql = "SELECT Appartment.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, Appartment.id_owner, CONCAT(Owner.forename,' ',Owner.name,' ',Owner.middlename) AS owner_info FROM Appartment 
        INNER JOIN Owner ON Appartment.id_owner = Owner.phone 
        INNER JOIN City ON City.id = Appartment.city_id
        INNER JOIN Street ON Street.id = Appartment.street_id WHERE 1 ";
    if(empty($appId_err)){
        $sql .= "AND Appartment.id = $appId ";
    }
    if(empty($mobile_err)){
        $sql .= "AND Owner.phone = $mobile ";
    }
    if(empty($city_err)){
        $sql .= "AND City.name LIKE '%{$city}%' ";
    }
    if(empty($street_err)){
        $sql .= "AND Street.name LIKE '%{$street}%' ";
    }
    if(empty($building_err)){
        $sql .= "AND Appartment.building = $building ";
    }
    if(empty($number_err)){
        $sql .= "AND Appartment.appartment_num = $number ";
    }
}
$result = $conn->query($sql);?>