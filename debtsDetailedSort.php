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
$cityDebt = $ownerDebt = "";
$cityDebt_err = $ownerDebt_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
   
    if(empty(trim($_POST["debt_city"]))){
        $cityDebt_err = "Please enter phone.";
    } else{
        $cityDebt = $_POST['debt_city'];
    }if(empty(trim($_POST["debt_owner"]))){
        $ownerDebt_err = "Please enter phone.";
    } else{
        $ownerDebt = $_POST['debt_owner'];
    }
     $sql = "SELECT  Debt.id, Appartment.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, Appartment.id_owner, CONCAT(Owner.forename,' ',Owner.name,' ',Owner.middlename) AS owner_info, date_of_currentDebt, gas, water, power FROM Debt
     INNER JOIN Appartment On Debt.appartment_id = Appartment.id 
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
    
}
$result = $conn->query($sql);?> 