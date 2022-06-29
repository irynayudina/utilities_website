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
$id = $owner_id = $appartment_id = $date_of_currentDebt = $gas = $water = $power = "";
$id_err = $owner_id_err = $appartment_id_err = $date_of_currentDebt_err = $gas_err = $water_err = $power_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if(empty(trim($_POST["d_id"]))){
        $id_err = "Please enter phone.";
    } else{
        $id = $_POST['d_id'];
    }  
    if(empty(trim($_POST["doif"]))){
        $owner_id_err = "Please enter phone.";
    } else{
        $owner_id = $_POST['doif'];
    }
    if(empty(trim($_POST["daif"]))){
        $appartment_id_err = "Please enter phone.";
    } else{
        $appartment_id = $_POST['daif']; 
    }
    if(empty(trim($_POST["ddf"]))){
        $date_of_currentDebt_err = "Please enter phone.";
    } else{
        $date_of_currentDebt = $_POST['ddf'];
    }
    if(empty(trim($_POST["dgdf"]))){
        $gas_err = "Please enter phone.";
    } else{
        $gas = $_POST['dgdf'];
    }
    if(empty(trim($_POST["dwdf"]))){
        $water_err = "Please enter phone.";
    } else{
        $water = $_POST['dwdf'];
    }
    if(empty(trim($_POST["dpdf"]))){
        $power_err = "Please enter phone.";
    } else{
        $power = $_POST['dpdf'];
    }
     $sql = "SELECT Debt.id, Owner.phone, appartment_id, date_of_currentDebt, gas, water, power FROM Debt 
     INNER JOIN Appartment On Debt.appartment_id = Appartment.id 
     INNER JOIN Owner On Owner.phone = Appartment.id_owner
     WHERE 1 ";
    if(empty($id_err)){
        $sql .= "AND Debt.id LIKE '%{$id}%' ";
    }
    if(empty($owner_id_err)){
        $sql .= "AND Owner.phone LIKE '%{$owner_id}%' ";
    }
    if(empty($appartment_id_err)){
        $sql .= "AND Debt.appartment_id LIKE '%{$appartment_id}%' ";
    }
    if(empty($date_of_currentDebt_err)){
        $sql .= "AND Debt.date_of_currentDebt LIKE '%{$date_of_currentDebt}%' ";
    }
    if(empty($gas_err)){
        $sql .= "AND Debt.gas LIKE '%{$gas}%' ";
    }
    if(empty($water_err)){
        $sql .= "AND Debt.water LIKE '%{$water}%' ";
    }
    if(empty($power_err)){
        $sql .= "AND Debt.power LIKE '%{$power}%' ";
    }
}
$result = $conn->query($sql);?>