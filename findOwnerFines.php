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
   
    if(empty(trim($_POST["daif"]))){
        $cityDebt_err = "Please enter phone.";
    } else{
        $cityDebt = $_POST['daif'];
    }
    $cityDebt = htmlspecialchars($_SESSION["phone"]);
     $sql = "SELECT Fines.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, 
     Fines.gas_fine, Fines.water_fine, Fines.power_fine FROM Fines INNER JOIN Appartment On Fines.id = Appartment.id 
     INNER JOIN Owner On Appartment.id_owner = Owner.phone
     INNER JOIN City ON City.id = Appartment.city_id 
    INNER JOIN Street ON Street.id = Appartment.street_id 
      WHERE 1 AND Owner.phone LIKE '%{$cityDebt}%' ";
    
    
}
$result = $conn->query($sql);?> 