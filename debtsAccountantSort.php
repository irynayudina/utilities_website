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
$cityDebt = $ownerDebt = $sd = $ed = $ai = "";
$cityDebt_err = $ownerDebt_err = $sd_err = $ed_err = $ai_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
   
    if(empty(trim($_POST["debt_city"]))){
        $cityDebt_err = "Please enter phone.";
    } else{
        $cityDebt = $_POST['debt_city'];
    }if(empty(trim($_POST["debt_owner"]))){
        $ownerDebt_err = "Please enter phone.";
    } else{
        $ownerDebt = $_POST['debt_owner'];
    }if(empty(trim($_POST["start_date"]))){
        $sd_err = "Please enter phone.";
    } else{
        $sd = $_POST['start_date'];
    }if(empty(trim($_POST["end_date"]))){
        $ed_err = "Please enter phone.";
    } else{
        $ed = $_POST['end_date'];
    }if(empty(trim($_POST["daif"]))){
        $ai_err = "Please enter phone.";
    } else{
        $ai = $_POST['daif'];
    }
     $sql = "SELECT  PaidDebts.id, Appartment.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, 
     Appartment.id_owner, CONCAT(Owner.forename,' ',Owner.name,' ',Owner.middlename) AS owner_info, date_of_currentDebt, gas_debt, water_debt, power_debt, 
     gas_paid, water_paid, power_paid, gas_remained, water_remained, power_remained FROM PaidDebts
     INNER JOIN Appartment On PaidDebts.appartment_id = Appartment.id 
     INNER JOIN Owner ON Appartment.id_owner = Owner.phone 
     INNER JOIN City ON City.id = Appartment.city_id
     INNER JOIN Street ON Street.id = Appartment.street_id 
     WHERE 1 ";
    
    if(empty($cityDebt_err)){
        $sql .= "AND City.id = '$cityDebt' ";
    }
    if(empty($ownerDebt_err)){
        $sql .= "AND Owner.phone LIKE '%{$ownerDebt}%' ";
    }
    if(empty($ai_err)){
        $sql .= "AND PaidDebts.appartment_id LIKE '%{$ai}%' ";
    }
    if(empty($sd_err) && empty($ed_err)){
        $sql .= "AND PaidDebts.date_of_currentDebt between '$sd' 
        and DATE_ADD('$ed',INTERVAL 1 DAY) ";
    }
    
}
$result = $conn->query($sql);?> 